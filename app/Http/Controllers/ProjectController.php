<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = active_team()->projects()->paginate(20);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  [
                'required',
                Rule::unique('projects')->where(function($query) use ($request) {
                    return $query->where('name', $request->name)
                            ->where('team_id', active_team()->id);
                })
            ],

            'description' =>    'required'
        ]);

        Project::create([
            'name'  =>  $request->name,
            'description'   =>  $request->description,
            'team_id'   =>  active_team()->id,
            'created_by'    =>  auth()->user()->id
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Project $project)
    {
        $tab =  request()->query('tab') ? request()->query('tab') : 'tasks';
        $users = $team->users;

        return view('projects.show', compact('project', 'users', 'tab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Project $project)
    {
        $this->validate($request, [
            'name'  =>  [
                'required',
                Rule::unique('projects')->where(function($query) use ($request, $team) {
                    return $query->where('name', $request->name)
                            ->where('team_id', $team->id);
                })->ignore($project->id)
            ],

            'description' =>    'required'
        ]);

        $project->update([
            'name'  =>  $request->name,
            'description'   =>  $request->description,
            'team_id'   =>  $team->id,
            'created_by'    =>  auth()->user()->id
        ]);

        return redirect()->back();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Get all users for a project
     *
     * @param Team $team
     * @param Project $project
     * @return void
     */
    public function getUsers(Team $team, Project $project)
    {
        return $project->users;
    }

    /**
     * Assinged users for the project 
     *
     * @param Request $request
     * @param Team $team
     * @param Project $project
     * 
     * @return void
     */
    public function assignedUser(Request $request, Team $team, Project $project)
    {
        $users = array_fill_keys($request->users, ['project_id' => $project->id]);

        $project->users()->wherePivote('project_id', $project->id)->sync($users);

        return redirect()->back();
    }
}

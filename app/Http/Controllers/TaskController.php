<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team, Project $project)
    {

        return $project->tasks()
            ->with('subTasks.user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team, Project $project)
    {
        $this->validate($request, [
            'name'  =>  [
                'required', 
                Rule::unique('tasks')->where(function($query) use ($request, $project) {
                    return $query->where('name', $request->name)
                            ->where('project_id', $project->id);
                })
            ],
            'description'   =>  'required'
        ]);

        $task = $project->tasks()->create([
            'name'  => $request->name,
            'description'   =>  $request->description,
            'milestone_id'  =>  $request->milestone,
            'created_by'    =>  auth()->user()->id
        ]);

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Project $project, Task $task)
    {
        $this->validate($request, [
            'name'  =>  [
                'required', 
                Rule::unique('tasks')->where(function($query) use ($request, $project) {
                    return $query->where('name', $request->name)
                            ->where('project_id', $project->id);
                })->ignore($task->id)
            ],
            'description'   =>  'required'
        ]);

        return $task->update([
            'name'  => $request->name,
            'description'   =>  $request->description,
            'milestone_id'  => $request->milestone,
            'created_by'    =>  auth()->user()->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Project $project, Task $task)
    {
        return $task->delete();
    }
}

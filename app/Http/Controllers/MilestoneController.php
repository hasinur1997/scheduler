<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Project;
use App\Team;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name'  => 'required',
            'due_date' => 'required',
            'description' =>    'required'
        ]);

        $project->milestones()->create([
            'name' =>    $request->name,
            'description'   =>   $request->description,
            'end_date'  =>  $request->due_date
        ]);

        return redirect('/team/'. $team->id .'/projects/'.$project->id.'?tab=milestones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Milestones  $milestones
     * @return \Illuminate\Http\Response
     */
    public function show(Milestone $milestones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Milestones  $milestones
     * @return \Illuminate\Http\Response
     */
    public function edit(Milestone $milestones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Milestones  $milestones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Project $project, Milestone $milestone)
    {
        $this->validate($request, [
            'name'  => 'required',
            'due_date' => 'required',
            'description' =>    'required'
        ]);

        $milestone->update([
            'name' =>    $request->name,
            'description'   =>   $request->description,
            'end_date'  =>  $request->due_date
        ]);

        return redirect('/team/'. $team->id .'/projects/'.$project->id.'?tab=milestones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Milestones  $milestones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Milestones $milestones)
    {
        //
    }
}

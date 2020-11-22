<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * List of all team
     *
     * @return void
     */    
    public function index()
    {
        return view('teams.index');
    }

    /**
     * Show a single team
     *
     * @param Team $team
     * @return void
     */
    public function show(Team $team)
    {
        return view('teams.show');
    }

    /**
     * Create team template
     *
     * @return void
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Edit team template
     *
     * @param Team $team
     * @return void
     */
    public function edit(Team $team)
    {
        return view('teams.edit');
    }

    /**
     * Store the team
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {   
        /**
         * Validation for the workspace
         */
        $this->validate($request, [
            'name'  => 'required|max:255',
        ] );

        // Create workspace
        $team = Team::create([
            'name'        => $request->name,
            'description' => $request->description,
            'created_by'  => auth()->id(),
        ]);
        
        // Assign current user to the new team
        $team->users()->attach(auth()->id());
        
        // Switch to the new workspace
        $this->switch($team);

        return redirect()->route('home');
    }

    /**
     * Update the team
     *
     * @param Request $request
     * @param Team $team
     * @return void
     */
    public function update(Request $request, Team $team)
    {
    
    }

    /**
     * Delete the team
     *
     * @param Team $team
     * @return void
     */
    public function destroy(Team $team)
    {
    
    }

    /**
     * Switch from one team to another team
     *
     * @param Team $team
     * @return void
     */
    public function switch(Team $team)
    {
        auth()->user()->switchTo($team);

        return redirect()->route('home');
    }

    /**
     * Get all users for the team
     *
     * @param Team $team
     * @return void
     */
    public function users(Team $team)
    {
        $users = $team->users()->paginate(20);

        return view('teams.users', compact('users'));
    }
    /**
     * Get all users 
     *
     * @param Team $team
     * 
     * @return collections
     */
    public function getMembers(Team $team)
    {
        return $team->users;
    }
}

<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Team;
use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team, User $user)
    {
        $this->authorize('viewAny', [$user, $team]);
        $tab = request()->query('tab') ? request()->query('tab') : 'activity' ;
        $roles = active_team()->roles;
        return view('users.profile', compact('user', 'roles', 'tab'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, User $user)
    {
        // Validate user inputs
        $this->validate($request, [
            'name'  => 'required',
            'email' =>  'required',
        ]);
        
        // Update user data
        $user->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
        ]);

        // Update user role
        $roles = array_fill_keys($request->roles, ['team_id' => active_team()->id]);

        $user->roles()
            ->wherePivot('team_id', active_team()->id)
            ->sync($roles);
        
        // Update user profile data
        Profile::updateOrCreate(
            [
                'user_id'   =>  $user->id
            ],
            [
                'phone'         =>  $request->phone,
                'address1'      =>  $request->address1,
                'address2'      =>  $request->address2,
                'birth_date'    =>  $request->birth_date,
                'blood_group'   =>  $request->blood_group,
                'gender'        =>  $request->gender
            ]
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

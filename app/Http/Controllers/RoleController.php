<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Role;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Ability::all();
        $roles = active_team()->roles;

        return view('roles.index', compact('permissions', 'roles') );
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
        $this->validate($request, [
            'name'  =>  [
                'required',
                Rule::unique('roles')->where(function($query) use ($request) {
                    return $query->where('name', $request->name)
                            ->where('team_id', active_team()->id);
                })
            ],
        ]);

        $role = Role::create([
            'name'  =>  $request->name,
            'description' =>    $request->description,
            'team_id'   =>  active_team()->id
        ]);
        
        if ( $request->abilities ) {
            $role->abilities()->attach($request->abilities, ['team_id' => active_team()->id]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name'  =>  [
                'required',
                Rule::unique('roles')->where(function($query) use ($request) {
                    return $query->where('name', $request->name)
                            ->where('team_id', active_team()->id);
                })->ignore($role->id)
            ],
        ]);

        $role->update([
            'name'  =>  $request->name,
            'description' =>    $request->description,
            'team_id'   =>  active_team()->id
        ]);
        

        if ( $request->abilities ) {
            $abilities = array_fill_keys($request->abilities, ['team_id' => active_team()->id]);
            $role->abilities()
                ->wherePivot('team_id', active_team()->id)
                ->sync($abilities);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back();
    }
}

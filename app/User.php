<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all teams of user
     *
     * @return collections
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Get the role of a user
     *
     * @return collections
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get all project of a user
     *
     * @return collections
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Get active team for current user
     *
     * @return object
     */
    public function getActiveTeam()
    {
        return $this->teams()->where('active', 1)->first();
    }

    /**
     * Check current user has active team
     *
     * @return boolean
     */
    public function hasActiveTeam()
    {
        return $this->getActiveTeam() ? true : false;
    }

    /**
     * Get active team user role abilities
     *
     * @return collections
     */
    public function getActiveTeamRole()
    {
        return $this->getActiveTeam()->roles->intersect($this->roles)->first();
    }

    /**
     * Get all abilities for the role that have the active user
     *
     * @return object
     */
    public function activeTeamRoleAbilities()
    {
        return $this->getActiveTeamRole() ? $this->getActiveTeamRole()->abilities : null;
    }

    /**
     * Check the permission for the user role
     *
     * @param string $permission
     * @return boolean
     */
    public function hasPermission($permission)
    {
        $abilities = $this->activeTeamRoleAbilities();

        return $abilities ? $abilities->contains('name', '=', $permission) : false;
    }

    /**
     * Get all assigned team
     *
     * @return collections
     */
    public function assignedTeams()
    {
        return $this->teams()
                ->where('active', 0)
                ->orWhere('active', null)
                ->get();
    }

    /**
     * Switch to another team
     *
     * @param object $team
     * @return void
     */
    public function switchTo($team)
    {
        $active_team = $this->getActiveTeam();

        if ( $active_team ) {
            $this->teams()->updateExistingPivot($active_team->id, ['active' => 0]);
        }

        $this->teams()->updateExistingPivot($team->id, ['active' => 1]);
    }

    /**
     * Get the user profile
     *
     * @return object
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Check is team owner
     *
     * @return boolean
     */
    public function isTeamOwner()
    {
       return $this->getActiveTeam()->created_by === $this->id;
    }

    /**
     * Get all notice for a user
     *
     * @return collections
     */
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    /**
     * Get all subtask of a user
     *
     * @return collections
     */
    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }
    
    /**
     * Get all current tasks
     *
     * @return return array
     */
    public function currentTasks()
    {
        return $this->subTasks()->where('team_id', active_team()->id )->get();
    }

    /**
     * Get all completed tasks
     *
     * @return array
     */
    public function completedTask()
    {
        return $this->subTasks()->where(['team_id' => active_team()->id, 'completed' => 1])->get();
    }
}

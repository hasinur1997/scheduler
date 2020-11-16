<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    /**
     * Get users of a team
     *
     * @return collections
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all projects of a team
     *
     * @return array
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all abilities for a team
     *
     * @return collections
     */
    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    /**
     * Get all roles of a team
     *
     * @return collections
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}

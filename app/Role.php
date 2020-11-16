<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $guarded = [];


    /**
     * Get all user of a role
     *
     * @return collections
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all abilities of a role
     *
     * @return collections
     */
    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    /**
     * Get the team of a role
     *
     * @return object
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

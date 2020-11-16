<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $guarded = [];

    /**
     * Get all role of an ability
     *
     * @return collections
     */
    public function roels()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get team for the ability
     *
     * @return object
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

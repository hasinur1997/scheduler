<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $guarded = [];

    /**
     * Get the project of a milestone
     *
     * @return collections
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all task of a milestone
     *
     * @return collections
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    protected $guarded = [];

    /**
     * Get project team
     *
     * @return object
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get all users of a project
     *
     * @return collections
     */
    public function users()
    {  
        return $this->belongsToMany(User::class);
    }   

    /**
     * Get all tasks of a project
     *
     * @return collections
     */
    public function tasks()
    {   
        return $this->hasMany(Task::class);
    }

    /**
     * Get all subtasks of a project
     *
     * @return collections
     */
    public function subTasks()
    {
        return $this->hasManyThrough(SubTask::class, Task::class);
    }

    /**
     * Get all notice for the project
     *
     * @return collections
     */
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    /**
     * Get all milestrone for a project
     *
     * @return collections
     */
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}

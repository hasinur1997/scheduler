<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $appends = ['is_admin'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all sub tasks of a task
     *
     * @return collections
     */
    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }

    public function getIsAdminAttribute()
    {
        return $this->id;
    }
}

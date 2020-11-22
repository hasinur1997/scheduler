<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $appends = ['total_tasks', 'completed_tasks', 'progress', 'completed'];

    /**
     * Get project of a task
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all comments of a task
     *
     * @return void
     */
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

    /**
     * Get milestone belong to this task
     *
     * @return object
     */
    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    /**
     * Get total subtask of a task
     *
     * @return integer
     */
    public function getTotalTasksAttribute()
    {
        return $this->subTasks()->count();
    }

    /**
     * Get total completed subtasks of a task
     *
     * @return integer
     */
    public function getCompletedTasksAttribute()
    {
        return $this->subTasks()->where('completed', 1)->get()->count();
    }

    /**
     * Get progress of a task
     *
     * @return integer
     */
    public function getProgressAttribute()
    {
        return $this->total_tasks == 0 ? 0 : number_format( ($this->completed_tasks / $this->total_tasks) * 100 );
    }

    /**
     * Get completed status
     *
     * @return integer
     */
    public function getCompletedAttribute()
    {
        return $this->completed_tasks == 100 ? 1 : 0;
    }

    /**
     * Get the query scope
     *
     * @param object $query
     * @return array
     */
    public function scopeWhereCompleted($query)
    {
       return  $query->where('completed', 1);
    }
}

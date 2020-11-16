<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    /**
     * Get the task of a comment
     *
     * @return object
     */
    public function task()
    {
        return $this->belongsTo(Project::class);
    }
}

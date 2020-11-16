<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    /**
     * Fillable columns
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Get all users of a subtask
     *
     * @return collections
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

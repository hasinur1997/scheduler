<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $guarded = [];

    /**
     * Get the project for notice
     *
     * @return object
     */
    public function projet()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user of notice
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

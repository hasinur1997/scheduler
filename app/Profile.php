<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Fill all fields
    protected $guarded = [];

    /**
     * Get the profile
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

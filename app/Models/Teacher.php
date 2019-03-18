<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id'];

    
    /**
     * Get the combinations for the teacher
     */
    public function combinations()
    {
        return $this->hasMany('App\Models\Combination');
    }
}

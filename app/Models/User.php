<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Teacher;
use App\Models\Student;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTeacher(){
        if($this->role == 3){
            return Teacher::where('status', 1)->where('user_id', $this->id)->first();
        }else{
            return 0;
        }
    }
    public function getStudent(){
        if($this->role == 4){
            return Student::where('status', 1)->where('user_id', $this->id)->first();
        }else{
            return 0;
        }
    }
}

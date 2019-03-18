<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClassRoom;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id'];

    public function getClassRoom(){
        return ClassRoom::where('status', 1)->with(['standard', 'division'])->where('id',$this->class_room_id)->first();
    }

    
}

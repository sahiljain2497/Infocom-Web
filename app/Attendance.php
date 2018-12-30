<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function scopeFindAttendance($query,$empid,$start,$end){
        return $query->where('emp_id','=',$empid)->whereDate('date','>=',$start)->whereDate('date','<=',$end)->get();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function scopeFindExpense($query,$empid,$start,$end){
        return $query->where('emp_id','=',$empid)->whereDate('date','>=',$start)->whereDate('date','<=',$end);
    }
}

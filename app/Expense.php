<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function scopeFindExpense($query,$empid,$start,$end){
        return $query->where('emp_id','=',$empid)->whereDate('date','>=',$start)->whereDate('date','<=',$end);
    }
    public function scopeFindByCoordinator($query,$id){
        return $query->where('coordinate','=',$id);
    }
    public function scopeFindById($query,$empid){
        return $query->where('emp_id','=',$empid);
    }
    public function scopeFindByStart($query,$start){
        return $query->whereDate('date','>=',$start);
    }
    public function scopeFindByEnd($query,$end){
        return $query->whereDate('date','<=',$end);
    }
    public function scopeNotMyExpense($query,$myid){
        return $query->whereNotIn('emp_id',[$myid]);
    }
    public function scopeCorApproved($query){
        return $query->where('c_approved','=','approved');
    }
}

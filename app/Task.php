<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function scopeFindById($query,$id){
        return $query->where('emp_id','=',$id);
    }
    public function scopeFindByStart($query,$start){
        return $query->whereDate('created_at','>=',$start);
    }
    public function scopeFindByEnd($query,$end){
        return $query->whereDate('updated_at','<=',$end);
    }
    public function scopeFindByOwner($query,$id){
        return $query->where('emp_id','=',$id)
                    ->orWhere('manager','=',$id);
    }
}

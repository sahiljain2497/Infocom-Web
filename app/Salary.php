<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
	protected $table = "salaries";
    protected $fillable = ['emp_id','present','absent','gross','pf','esi','net_pay','date','month','year'];
}

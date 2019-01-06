<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name', 'companyname','emp_id','gstin','email',
        'mobile','aadhar','pan','address_line_1','address_line_2'
    ];
}

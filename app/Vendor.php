<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $fillable = ['code','company_name','gstin','account','pan','aadhar','rate_list'];
     protected $casts = [
    	'rate_list' => 'array'
    ];
}

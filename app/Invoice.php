<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no', 'invoice_type','invoice_path','sender_companyname','reciever_companyname','items_table',
        'invoice_description' , 'invoice_total' , 'invoice_date' , 'sender_gstin' , 'sender_contact' , 'sender_pan',
        'sender_address_1' , 'sender_address_2' , 'reciever_gstin' , 'reciever_pan' , 'reciever_contact' ,
        'reciever_address_1','reciever_address_2'
    ];
    protected $casts = [
    	'items_table' => 'array'
    ];
}

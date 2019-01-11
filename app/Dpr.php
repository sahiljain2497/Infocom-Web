<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dpr extends Model
{
    protected $fillable = ['date' ,
    'month' ,
    'project' ,
    'customer' ,
    'circle' ,
    'cluster',
    'site_id_a' ,
    'site_id_b' ,
    'site_name_a' ,
    'site_name_b' ,
    'link_id' ,
    'site_type' ,
    'activity_type',
    'sow' ,
    'quantity' ,
    'rate' ,
    'amount' ,
    'payterm' ,
    'first_mile_amount' ,
    'allocation_date' ,
    'integration_date' ,
    'installation_date' ,
    'dismentale_date',
    'at_date',
    'at_status',
    'site_completion_date',
    'completion_status',
    'anteena_size',
    'tower_type_a',
    'tower_type_b',
    'payment_status',
    'wcc_status',
    'invoice_number',
    'invoice_amount',
    'invoice_status',
    'po_number',
    'po_status',
    'team_name',
    'done_by',
    'vendor_name',
    'vendor_rate',
    'vendor_payment_status',
    'creator_id'];

    public function scopeFindById($query,$id){
        return $query->where('creator_id','=',$id);
    }
    public function scopeFindByStart($query,$start){
        return $query->whereDate('created_at','>=',$start);
    }
    public function scopeFindByEnd($query,$end){
        return $query->whereDate('updated_at','<=',$end);
    }
}

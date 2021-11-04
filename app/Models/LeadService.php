<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadService extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'amount',
        'service_id',
        'lead_id',
    ];
    public function service()
    {
       return $this->belongsTo(Service::Class,'service_id','id');

    }

    /* public function lead()
     {
         return $this->belongsTo(LeadProxy::modelClass());
     }

     public function getNameAttribute()
     {
         return $this->product->name;
     }

     public function toArray()
     {
         $array = parent::toArray();

         $array['name'] = $this->name;

         return $array;
     }*/
}

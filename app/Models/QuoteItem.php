<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'address',
        'service_ids',
        'quote_price',
        'adjustment_price',
        'final_quote_price',
        'status',
    ];
    public function details()
    {
        return $this->hasMany(QuoteItemDetail::class, 'quote_item_id', 'id');
    }
//    public function get_service()
//    {
//        return $this->hasMany(Service::class, 'service_ids', 'id');
//    }
}

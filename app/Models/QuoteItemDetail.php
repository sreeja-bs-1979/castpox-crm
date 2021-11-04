<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItemDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote_item_id',
        'service_id',
        'service_detail',
        'unit_price',
        'qty',
        'total',
        'status',
    ];
    public function quote()
    {
       // return $this->hasOne(QuoteItem::class, 'quote_item_id', 'id');
        return $this->belongsTo(QuoteItem::class, 'quote_item_id', 'id');
    }
}

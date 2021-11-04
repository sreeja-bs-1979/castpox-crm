<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'description',
            'status',
    ];
//    public function get_quote()
//    {
//        return $this->hasMany(QuoteItem::class, 'id', 'service_ids');
//    }
    public static function getService($id)
    {
        return (new static)::where('id',$id)->first();

    }
}

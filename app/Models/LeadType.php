<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    /**
     * Get the leads.
     */
  /*  public function leads()
    {
        return $this->hasMany(LeadProxy::modelClass());
    }*/
}

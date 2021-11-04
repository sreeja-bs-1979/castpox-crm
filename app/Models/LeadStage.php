<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'is_user_defined',
    ];

    /**
     * Get the leads.
     */
    /*public function leads()
    {
        return $this->hasMany(LeadProxy::modelClass());
    }*/
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';

    protected $with = 'organization';

    protected $casts = [
        'emails' => 'array',
        'contact_numbers' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'emails',
        'contact_numbers',
        'organization_id',
    ];

    /**
     * Get the organization that owns the person.
     */
   public function organization()
    {
        return $this->belongsTo(Organization::class,'organization_id','id');
    }
}

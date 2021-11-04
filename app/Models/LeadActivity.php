<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadActivity extends Model
{
    use HasFactory;
    protected $table = 'lead_pipelines';


    /*protected $fillable = [
        'name',
        'is_default',
    ];


    public function leads()
    {
        return $this->hasMany(LeadProxy::modelClass());
    }


    public function stages()
    {
        return $this->hasMany(PipelineStageProxy::modelClass());
    }*/
}

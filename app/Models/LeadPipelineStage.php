<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadPipelineStage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'lead_pipeline_stages';

    protected $fillable = [
        'probability',
        'sort_order',
        'lead_stage_id',
        'lead_pipeline_id',
    ];
   /* public function pipeline()
    {
        return $this->belongsTo(PipelineProxy::modelClass());
    }
    public function stage()
    {
        return $this->belongsTo(StageProxy::modelClass());
    }*/
}

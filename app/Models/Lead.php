<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'lead_value',
        'status',
        'lost_reason',
        'expected_close_date',
        'closed_at',
        'user_id',
        'person_id',
        'lead_source_id',
        'lead_type_id',
        'lead_pipeline_id',
        'lead_stage_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class,'person_id','id');
    }
    public function type()
    {
        return $this->belongsTo(LeadType::class,'lead_type_id','id');
    }
    public function source()
    {
        return $this->belongsTo(LeadSource::class,'lead_source_id','id');
    }
    public function pipeline()
    {
        return $this->belongsTo(LeadPipeline::class,'lead_pipeline_id','id');
    }
    public function stage()
    {
        return $this->belongsTo(LeadStage::class, 'lead_stage_id','id');
    }
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'lead_activities');
    }
    public function services()
    {
        return $this->hasMany(LeadService::class,'lead_id','id');
    }
//    public function emails()
//    {
//        return $this->hasMany(EmailProxy::modelClass());
//    }
//    public function quotes()
//    {
//        return $this->belongsToMany(QuoteProxy::modelClass(), 'lead_quotes');
//    }
    public function tags()
    {
        return $this->belongsToMany(Tag::Class, 'lead_tags');
    }
    public static function getNewLeads()
    {
        //dd((new static)::where('lead_stage_id',1)->get());
        return (new static)::where('lead_stage_id',1)->get();
    }
    public static function getFollowUpLeads()
    {
        return (new static)::where('lead_stage_id',2)->get();
    }
    public static function getProspectsLeads()
    {
        return (new static)::where('lead_stage_id',3)->get();
    }
    public static function getNegotiationLeads()
    {
        return (new static)::where('lead_stage_id',4)->get();
    }
    public static function getWonLeads()
    {
        return (new static)::where('lead_stage_id',5)->get();
    }
    public static function getLostLeads()
    {
        return (new static)::where('lead_stage_id',6)->get();
    }
//    public function organization($organization_id)
//    {
//        return $this->hasOne(Person,organization_id,person_id);
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';

//    protected $with = ['file', 'user'];

    protected $dates= [
        'schedule_from',
        'schedule_to',
    ];
    protected $fillable = [
        'title',
        'type',
        'comment',
        'additional',
        'schedule_from',
        'schedule_to',
        'is_done',
        'user_id',
    ];
    /**
     * Get the user that owns the activity.
     */
    public function user()
    {
        return $this->belongsTo(User::Class,'user_id','id');
    }

    /**
     * The participants that belong to the activity.
     */
   /* public function participants()
    {
        return $this->hasMany(ParticipantProxy::modelClass());
    }

    /**
     * Get the file associated with the activity.
     *
    public function file()
    {
        return $this->hasOne(FileProxy::modelClass(), 'activity_id');
    }*/
}

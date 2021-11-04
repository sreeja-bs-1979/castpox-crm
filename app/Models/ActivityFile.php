<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityFile extends Model
{
    use HasFactory;
    protected $table = 'activity_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'activity_id',
    ];

    /**
     * Get image url for the product image.
     */
    public function url()
    {
        return Storage::url($this->path);
    }

    /**
     * Get image url for the product image.
     */
    public function getUrlAttribute()
    {
        return $this->url();
    }

    /**
     * Get the activity that owns the file.
     */
    public function activity()
    {
        return $this->belongsTo(ActivityProxy::modelClass());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        $array['url'] = $this->url;

        return $array;
    }
}

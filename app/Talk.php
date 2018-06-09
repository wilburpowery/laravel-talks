<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $guarded = [];

    protected $with = ['likes_count'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($talk) {
            $talk->update(['slug' => str_slug($talk->title) . "-$talk->id"]);
        });
    }

    public function getThumbnailPathAttribute($thumbnail_path)
    {
        return asset($thumbnail_path);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }
}

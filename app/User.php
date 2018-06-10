<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function talks()
    {
        return $this->hasMany(Talk::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeTalk(Talk $talk)
    {
        $this->likes()->create([
            'talk_id' => $talk->id,
        ]);
    }
}

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
        'name', 'email', 'github_id', 'avatar', 'nickname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'github_id', 'remember_token',
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

    public function contactsForTalk()
    {
        return $this->hasMany(UsersContactForTalk::class);
    }

    public function hasContactedAboutTalk($talk)
    {
        return (bool) $this->contactsForTalk->where('talk_id', $talk->id)->count();
    }
}

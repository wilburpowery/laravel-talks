<?php

namespace App\Http\Controllers;

use App\Talk;

class TalkLikesController extends Controller
{
    public function store(Talk $talk)
    {
        auth()->user()->likeTalk($talk);

        return response([], 201);
    }

    public function destroy(Talk $talk)
    {
        $talk->likes()->where('user_id', auth()->id())->first()->delete();

        return response([], 202);
    }
}

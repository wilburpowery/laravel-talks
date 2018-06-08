<?php

namespace App\Http\Controllers;

use App\Talk;

class TalksController extends Controller
{
    public function create()
    {
        return view('talks.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image',
            'slides_url' => 'required|url',
            'video_url' => 'url',
            'available_to_speak' => 'required|boolean'
        ]);

        $talk = Talk::create([
            'title' => request('title'),
            'description' => request('description'),
            'thumbnail_path' => request()->file('thumbnail')->store('thumbnails', 'public'),
            'slides_url' => request('slides_url'),
            'video_url' => request('video_url'),
            'available_to_speak' => request('available_to_speak')
        ]);

        return back();
    }

    public function show(Talk $talk)
    {
        return view('talks.show', ['talk' => $talk]);
    }
}

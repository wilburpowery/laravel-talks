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
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'accepting_petitions' => 'required|boolean'
        ]);

        $talk = Talk::create($data);

        return redirect(route('talk.links.create', $talk));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Services\UploadCare;

class TalksController extends Controller
{
    public function create()
    {
        return view('talks.create', ['uploadcare' => new UploadCare]);
    }

    public function store(UploadCare $uploadcare)
    {
        $imgPath = '';

        if (request()->has('image')) {
            try {
                $image = $uploadcare->api()->getFile(request()->image);
                $imgPath = $image->resize(590, 330)->getUrl();
            } catch (\Throwable $e) {
                $imgPath = null;
            }
        }

        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => [function ($attribute, $value, $fail) use ($imgPath) {
                if (empty($imgPath)) {
                    return $fail($attribute .' is required');
                }
            }],
            'slides_url' => 'required|url',
            'video_url' => 'url|nullable',
        ]);

        if (!empty($image)) {
            $image->store();
        }

        $talk = auth()->user()->talks()->create([
            'title' => request('title'),
            'description' => request('description'),
            'thumbnail_url' => isset($imgPath) ? $imgPath : null,
            'slides_url' => request('slides_url'),
            'video_url' => request('video_url'),
            'available_to_speak' => request()->has('available_to_speak')
        ]);

        return back();
    }
}

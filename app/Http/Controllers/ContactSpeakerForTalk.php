<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Mail\ContactTalkSpeaker;
use Illuminate\Support\Facades\Mail;

class ContactSpeakerForTalk extends Controller
{
    public function __invoke(Talk $talk)
    {
        Mail::to($talk->user)->send(new ContactTalkSpeaker($talk, auth()->user()));

        return response('Mail Sent Successfully', 202);
    }
}

<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Mail\ContactTalkSpeaker;
use Illuminate\Support\Facades\Mail;

class ContactSpeakerForTalk extends Controller
{
    public function __invoke(Talk $talk)
    {
        abort_if(
            auth()->user()->hasContactedAboutTalk($talk),
            403
        );

        Mail::to($talk->user)->send(new ContactTalkSpeaker($talk, auth()->user()));

        auth()->user()->contactsForTalk()->create([
            'talk_id' => $talk->id
        ]);

        return response('Mail Sent Successfully', 202);
    }
}

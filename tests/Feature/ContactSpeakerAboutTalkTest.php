<?php

namespace Tests\Feature;

use App\Talk;
use Tests\TestCase;
use App\Mail\ContactTalkSpeaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactSpeakerAboutTalkTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_authenticated_user_can_send_contact_a_speaker_about_a_talk()
    {
        Mail::fake();

        $this->signIn();

        $talk = factory(Talk::class)->create();

        $this->post(route('contact-speaker-for-talk', $talk));

        Mail::assertSent(ContactTalkSpeaker::class, function ($mail) use ($talk) {
            return $mail->hasTo($talk->user->email);
        });
    }
}

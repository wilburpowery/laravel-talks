<?php

namespace Tests\Feature;

use App\Talk;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeeTalksTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_visitor_can_see_a_single_talk()
    {
        $this->signIn();

        $talk = factory(Talk::class)->create();

        $response = $this->get(route('talks.show', $talk))
            ->assertSuccessful()
            ->assertViewIs('talks.show')
            ->assertSee($talk->title);
    }
}

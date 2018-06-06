<?php

namespace Tests\Unit;

use App\Talk;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TalkTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_talks_slug_has_its_id_appended()
    {
        $talk = factory(Talk::class)->create(['title' => 'My First Talk']);

        $this->assertEquals('my-first-talk-1', $talk->slug);
    }
}

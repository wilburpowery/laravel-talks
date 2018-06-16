<?php

namespace Tests\Feature;

use App\Talk;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTalksTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_signed_in_user_can_view_the_form_to_add_a_talk()
    {
        $this->signIn();

        $this->get(route('talks.create'))
            ->assertSuccessful()
            ->assertViewIs('talks.create');
    }

    /** @test **/
    public function a_user_can_add_a_talk()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $this->post(route('talks.store'), [
            'title' => 'My First Talk',
            'description' => 'Learn to TDD a Laravel application',
            'slides_url' => 'https://cdn.com/slides',
            'video_url' => 'https://cdn.com/video',
            'thumbnail_url' => null,
            'available_to_speak' => true,
        ]);

        $this->assertDatabaseHas('talks', [
            'title' => 'My First Talk',
            'slug' => 'my-first-talk-1',
            'slides_url' => 'https://cdn.com/slides',
            'video_url' => 'https://cdn.com/video',
            'available_to_speak' => true
        ]);
    }
}

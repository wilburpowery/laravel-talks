<?php

namespace Tests\Feature;

use App\Talk;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        Storage::fake('public');

        $this->signIn();

        $this->post(route('talks.store'), [
            'title' => 'My First Talk',
            'description' => 'Learn to TDD a Laravel application',
            'slides_url' => 'https://cdn.com/slides',
            'video_url' => 'https://cdn.com/video',
            'thumbnail' => $file = UploadedFile::fake()->image('thumbnail.jpg'),
            'available_to_speak' => true,
        ]);

        Storage::disk('public')->assertExists("thumbnails/{$file->hashName()}");

        $this->assertDatabaseHas('talks', [
            'title' => 'My First Talk',
            'slug' => 'my-first-talk-1',
            'slides_url' => 'https://cdn.com/slides',
            'video_url' => 'https://cdn.com/video',
            'thumbnail_path' => "thumbnails/{$file->hashName()}",
            'available_to_speak' => true
        ]);
    }

    /** @test **/
    public function a_talk_requires_a_thumbnail()
    {
        $this->signIn();

        $response = $this->post(route('talks.store'), [
            'title' => 'My First Talk',
            'description' => 'Learn to TDD a Laravel application',
            'slides_url' => 'https://cdn.com/slides',
            'video_url' => 'https://cdn.com/video',
            'available_to_speak' => true,
        ]);

        $response->assertSessionHasErrors(['thumbnail']);
    }
}

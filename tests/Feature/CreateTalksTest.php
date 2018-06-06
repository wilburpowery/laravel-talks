<?php

namespace Tests\Feature;

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

        $this->post(route('talks.store'), [
            'title' => 'My First Talk',
            'description' => 'Learn to TDD a Laravel application',
            'accepting_petitions' => true,
        ]);

        $this->assertDatabaseHas('talks', [
            'title' => 'My First Talk',
            'slug' => 'my-first-talk-1',
            'accepting_petitions' => true
        ]);
    }

    /** @test **/
    public function a_user_gets_redirect_to_the_links_page_after_adding_the_talk()
    {
        $this->signIn();

        $response = $this->post(route('talks.store'), [
            'title' => 'My First Talk',
            'description' => 'Learn to TDD a Laravel application',
            'accepting_petitions' => true,
        ]);

        $response->assertRedirect(route('talk.links.create', 1));
    }
}

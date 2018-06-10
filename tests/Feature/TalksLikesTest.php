<?php

namespace Tests\Feature;

use App\Talk;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TalksLikesTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_like_a_talk()
    {
        $this->signIn();

        $user = factory(User::class)->create();
        $this->signIn($user);

        $talk = factory(Talk::class)->create();

        $this->post(route('talk.like', $talk))
            ->assertStatus(201);

        $this->assertCount(1, $talk->likes);
    }

    /** @test **/
    public function a_user_can_unlike_a_talk()
    {
        $user = factory(User::class)->create();
        $this->signIn($user);

        $talk = factory(Talk::class)->create();

        $this->post(route('talk.like', $talk))
            ->assertStatus(201);

        $this->assertCount(1, $talk->likes);

        $this->delete(route('talk.unlike', $talk));

        $this->assertCount(0, $talk->fresh()->likes);
    }
}

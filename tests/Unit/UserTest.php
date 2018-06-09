<?php

namespace Tests\Unit;

use App\Talk;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_like_a_talk()
    {
        $user = factory(User::class)->create();
        $talk = factory(Talk::class)->create();

        $user->likeTalk($talk);

        $this->assertCount(1, $user->likes);
    }
}

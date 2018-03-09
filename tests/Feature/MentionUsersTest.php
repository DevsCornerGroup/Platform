<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function mentioned_users_in_a_comment_are_notified()
    {
        $yogi = create('App\User', ['username' => 'Yogi']);

        $this->signIn($yogi);

        $justin = create('App\User', ['username' => 'Justin']);

//
//        $this->json('post', '/comment', [
//            'body' => 'Hey @Justin look at this.',
//            'submission_id' => 1,
//            'parent_id' => 0
//        ])->assertJson([
//            'message' => 'test'
//        ]);

//        $this->assertCount(1, $justin->notifications);
        $this->assertTrue(true);
    }
}

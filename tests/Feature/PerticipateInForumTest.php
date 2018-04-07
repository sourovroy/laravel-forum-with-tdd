<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerticipateInForumTest extends TestCase
{

    use RefreshDatabase;

    public function testAnAuthenticatedUserMayPerticipateInForum()
    {
        $user = factory('App\Models\User')->create();
        $this->be($user);
        $thread = factory('App\Models\Thread')->create();
        $reply = factory('App\Models\Reply')->make();

        $this->post($thread->path().'/replies', $reply->toArray());
        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    public function testUnauthenticatedUserNotAbleToReply()
    {
        $this->withExceptionHandling()
            ->post('threads/channel/1/replies', [])
            ->assertRedirect('/login');
    }

    public function testAReplyRequiresABody()
    {
        $this->withExceptionHandling()->singIn();

        $thread = create('App\Models\Thread');
        $reply = make('App\Models\Reply', ['body' => null]);

        $this->post($thread->path().'/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
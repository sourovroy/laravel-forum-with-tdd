<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthenticatedUserMayCreateThread()
    {
        $this->actingAs(factory('App\Models\User')->create());
        $thread = factory('App\Models\Thread')->make();

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    public function testGuestNotAbleToCreateThread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Models\Thread')->make();
        $this->post('/threads', $thread->toArray());
    }

}
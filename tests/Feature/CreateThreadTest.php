<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthenticatedUserMayCreateThread()
    {
        $this->singIn();
        $thread = create('App\Models\Thread');

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    public function testGuestNotAbleToCreateThread()
    {
        $this->withExceptionHandling();
        
        $this->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads', [])
            ->assertRedirect('/login');
    }


}
<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Models\Thread')->create();
    }

    public function testAnUserCanBrowseAllThreads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    public function testAnUserCanBrowseSingleThreads()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    public function testUserCanReadRepliesOfAThread()
    {
        $reply = factory('App\Models\Reply')->create([
            'thread_id' => $this->thread->id
        ]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
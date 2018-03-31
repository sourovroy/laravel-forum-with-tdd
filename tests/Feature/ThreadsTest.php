<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;

    public function testAnUserCanBrowseAllThreads()
    {
        $thread = factory('App\Models\Thread')->create();
        
        $response = $this->get('/threads');
        $response->assertSee($thread->title);

    }

    public function testAnUserCanBrowseSingleThreads()
    {
        $thread = factory('App\Models\Thread')->create();

        $response = $this->get($thread->path());
        $response->assertSee($thread->title);
    }
}
<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    protected function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Models\Thread');
    }

    public function testThreadHasCreator()
    {
        $this->assertInstanceOf(
            'App\Models\User', 
            $this->thread->creator
        );
    }

    public function testThreadHasReplies()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', 
            $this->thread->replies
        );
    }

    public function testThreadCanAddaReply()
    {
        $this->thread->addReply([
            'body' => 'lorem ipsum',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

    public function testThreadBelongsToAChannel()
    {
        $this->assertInstanceOf(
            'App\Models\Channel', 
            $this->thread->channel
        );
    }

    public function testThreadHaveStringSlug()
    {
        $this->assertEquals(
            '/threads/'.$this->thread->channel->slug.'/'.$this->thread->id, 
            $this->thread->path()
        );
    }
}
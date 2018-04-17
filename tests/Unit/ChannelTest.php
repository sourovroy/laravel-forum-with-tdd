<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    public function testAChannelConsistsOfThreads()
    {
        $channel = create('App\Models\Channel');
        $thread = create('App\Models\Thread', [
            'channel_id' => $channel->id
        ]);

        $this->assertTrue($channel->threads->contains($thread));
    }
}
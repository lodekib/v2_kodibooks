<?php

namespace Tests\Feature;

use App\Events\MpesaReceived;
use App\Listeners\MpesaReceivedListener;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class MpesaEventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function test_mpesa_can_be_received():void
    // {
    //     Event::fake();
    //     Event::assertDispatched(MpesaReceived::class);
    //     Event::assertDispatched(MpesaReceived::class,2);
    //     Event::assertNotDispatched(MpesaReceived::class);
    //     Event::assertNothingDispatched(MpesaReceived::class);
    //     Event::assertListening(MpesaReceived::class,MpesaReceivedListener::class);
    // }
}

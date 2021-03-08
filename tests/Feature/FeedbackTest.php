<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        Storage::fake();

        $response = $this->post('/feedback',[
            '_token' => csrf_token(),
            'name' => 'Name123',
            'text' => 'Comment'
        ]);

        $response->assertStatus(200);
    }
}

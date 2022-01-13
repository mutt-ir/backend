<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;

class URLShortenerControllerAPITest extends TestCase
{
    public function test_api_short_no_slug()
    {
        $response = $this->post('/api/short', [
            'url' => 'https://google.com',
        ]);
        $response->assertJsonStructure([
           'status',
           'data' => [
               'shortened_url',
               'url',
               'slug'
           ]
        ])->assertJson([
            'status' => true,
            'data' => [
                'url' => 'https://google.com'
            ]
        ]);
    }

    public function test_api_short_validation()
    {
        $response = $this->post('/api/short', []);
        $response->assertJsonStructure([
            'status',
            'errors'
        ])->assertJson([
            'status' => false,
        ])->assertStatus(422);
    }
}

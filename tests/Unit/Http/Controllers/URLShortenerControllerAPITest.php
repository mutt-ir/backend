<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\Link;
use Tests\TestCase;

class URLShortenerControllerAPITest extends TestCase
{
    public function test_api_short_no_slug()
    {
        $this->post('/api/short', [
            'url' => 'https://google.com',
        ])->assertJsonStructure([
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

    public function test_api_short_validation_link()
    {
        $this->post('/api/short', [
            'url' => 'invalid link',
            'slug' => Link::getSlug()
        ])->assertJsonStructure([
            'status',
            'errors'
        ])->assertJson([
            'status' => false,
        ])->assertStatus(422);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddNews()
    {
        $response = $this->get(route('news.create'));

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSaveNews()
    {
        $data = [
            'title' => 'Some text',
            'author' => 'Some author',
            'content' => 'Some content'
        ];

        $response = $this->post(route('news.store'), $data);

        $response->assertJson($data)->assertStatus(200);
    }
}

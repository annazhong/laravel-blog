<?php

namespace Tests\Feature;

use App\Post;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);

        // $this->get('/')->assertSee('Archives');
    

        //var_dump(\Carbon\Carbon::now()->subMonth());die;
        $first = factory(Post::class)->create();

        // $second = factory(Post::class)->create([
        //     'created_at' => \Carbon\Carbon::now()->subMonth()
        // ]);

        Post::Archives();

        $this->assertCount(2, $posts);
    }
}

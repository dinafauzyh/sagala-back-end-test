<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Mockery\MockInterface;
use App\Models\Article\Article;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\Article\ArticleInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;

class ArticleTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * Get all articles test.
     */
    public function test_can_get_articles(): void
    { 
        Article::factory()->createMany([
            [
                'title' => 'First Article',
                'body' => 'This is content for first article'
            ],
            [
                'title' => 'Second Article',
                'body' => 'This is content for second article'
            ]
        ]);

        $response = $this->getJson('api/articles');
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status_code',
                'message',
                'data' => [
                    'articles' => [
                        '*' => [
                            'id',
                            'author',
                            'title',
                            'body',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            ]);
    }
}

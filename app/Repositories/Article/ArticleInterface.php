<?php

namespace App\Repositories\Article;

use Illuminate\Http\Request;
use App\Models\Article\Article;

interface ArticleInterface
{
    /**
     * Get All Articles
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(Request $request);

    /**
     * Create Article
     * 
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Article\Article
     */
    public function store(Request $request): Article;
}
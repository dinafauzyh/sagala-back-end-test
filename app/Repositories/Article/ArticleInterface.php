<?php

namespace App\Repositories\Article;

use Illuminate\Http\Request;

interface ArticleInterface
{
    /**
     * Get All Articles
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(Request $request);
}
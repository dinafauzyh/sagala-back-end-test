<?php

namespace App\Repositories\Article;

use App\Models\Article\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleRepository implements ArticleInterface
{
    /**
     * Constructor
     * 
     * @param \App\Models\Article\Article $model
     * @param string $cacheKey
     */
    public function __construct(
        protected Article $model,
        protected string $cacheKey = 'article_'
    ) {  
    }

    /**
     * Get All Articles
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(Request $request)
    {
        return $this->model
            ->when(
                $request->search,
                fn ($q) => $q->where('body', 'ILIKE', '%' . $request->search . '%')
                    ->orWhere('title', 'ILIKE', '%' . $request->search . '%')
            )
            ->when(
                $request->author,
                fn ($q) => $q->where('author', $request->author)
            )
            ->latest()
            ->get();
    }
}
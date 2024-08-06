<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Repositories\Article\ArticleInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Constructor
     * 
     * @param \App\Repositories\Article\ArticleInterface $articleRepository
     * @param string $dataKeys
     */
    public function __construct(
        protected ArticleInterface $articleRepository,
        protected string $dataKeys = 'articles',
        protected string $dataKey = 'article'
    ) {
    }

    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $articles = $this->articleRepository->list($request);

        return setResponse(
            $this->setStatusCodeResponse(Response::HTTP_OK)
                ->setMessageToResponse('OK')
                ->appendDataToResponse(
                    [
                        $this->dataKeys =>  ArticleResource::collection($articles)
                    ]
                )->response
        );
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \App\Http\Requests\Article\ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->articleRepository->store($request);

        return setResponse(
            $this->setStatusCodeResponse(Response::HTTP_CREATED)
                ->setMessageToResponse('CREATED')
                ->appendDataToResponse([
                        $this->dataKey => ArticleResource::make($article)
                ])->response
        );
    }
}

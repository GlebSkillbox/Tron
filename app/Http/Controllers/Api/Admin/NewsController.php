<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\News\NewsCollection;
use App\Http\Resources\News\NewsResource;
use App\Models\News\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(5);

        return new NewsCollection($news);
    }

    public function store(NewsRequest $request)
    {
        $news = News::create($request->all());

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(201);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }

    public function update(News $news, NewsRequest $request)
    {
        $news->update($request->all());

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(201);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return response()->noContent();
    }
}

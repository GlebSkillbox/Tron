<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(4);

        return response()->json($news);
    }

    public function store(NewsRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = $request->user()->id;

        News::create($data);

        return redirect()->route('api.admin.news.index');
    }

    public function show(News $news)
    {
        return response()->json($news);
    }

    public function update(News $news, NewsRequest $request)
    {
        $news->update($request->all());

        return redirect()->route('api.admin.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('api.admin.news.index');
    }
}

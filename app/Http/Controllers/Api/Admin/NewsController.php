<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(4);

        return response()->json($news);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title'   => ['required', 'string', 'max:255', 'unique:news'],
            'content' => ['required', 'string'],
            'date'    => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = request()->all();
        $data['created_by'] = auth()->id();

        News::create($data);

        return redirect()->route('api.admin.news.index');
    }

    public function show(News $news)
    {
        return response($news);
    }

    public function update(News $news)
    {
        $validator = Validator::make(request()->all(), [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('news')->ignore($news->id),
            ],
            'content' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $news->update(request()->all());

        return redirect()->route('api.admin.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('api.admin.news.index');
    }
}

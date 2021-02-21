<?php

namespace App\Http\Controllers\Api\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Resources\Page\PageCollection;
use App\Http\Resources\Page\PageResource;
use App\Models\Page\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $pages = Page::latest()->get();

        return new PageCollection($pages);
    }

    public function store(PageRequest $request)
    {
        $page = Page::create($request->all());

        return (new PageResource($page))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Page $page)
    {
        return new PageResource($page);
    }

    public function update(Page $page, PageRequest $request)
    {
        $page->update($request->all());

        return (new PageResource($page))
            ->response()
            ->setStatusCode(201);
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return (new PageResource($page))
            ->response()
            ->setStatusCode(204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback\Feedback;
use App\Models\Feedback\FeedbackTheme;
use App\Events\Feedbacks\FeedbackCreated;

class FeedbackController extends Controller
{
    public function create()
    {
        $themes = FeedbackTheme::all();

        return response()->json($themes);
    }

    public function store(FeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        event(new FeedbackCreated($feedback));

        return response()->json(['data' => $feedback], 201);
    }
}

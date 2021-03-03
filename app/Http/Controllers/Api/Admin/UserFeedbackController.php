<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFeedbackRequest;
use App\Http\Resources\User\UserFeedbackCollection;
use App\Http\Resources\User\UserFeedbackResource;
use App\Models\User\UserFeedback;

class UserFeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $userFeedbacks = UserFeedback::all();

        return new UserFeedbackCollection($userFeedbacks);
    }

    public function store(UserFeedbackRequest $request)
    {
        $userFeedback = UserFeedback::create($request->all());

        return (new UserFeedbackResource($userFeedback))
            ->response()
            ->setStatusCode(201);
    }

    public function show(UserFeedback $feedback)
    {
        return new UserFeedbackResource($feedback);
    }

    public function update(UserFeedback $feedback, UserFeedbackRequest $request)
    {
        $feedback->update($request->all());

        return (new UserFeedbackResource($feedback))
            ->response()
            ->setStatusCode(201);
    }

    public function destroy(UserFeedback $feedback)
    {
        $feedback->delete();

        return response()->noContent();
    }
}

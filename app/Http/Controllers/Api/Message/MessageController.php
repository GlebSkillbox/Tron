<?php

namespace App\Http\Controllers\Api\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\Message\MessageCollection;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message\Message;
use Illuminate\Validation\UnauthorizedException;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $messages = auth()->user()->allMessage();

        return new MessageCollection($messages);
    }

    public function send(MessageRequest $request)
    {
        $message = auth()->user()->sendMessageTo($request->recipient_id, $request->body);

        return (new MessageResource($message))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Message $message)
    {
        return (new MessageResource($message));
    }
}

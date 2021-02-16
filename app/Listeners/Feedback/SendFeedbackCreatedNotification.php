<?php

namespace App\Listeners\Feedback;

use App\Events\Feedbacks\FeedbackCreated;
use Illuminate\Support\Facades\Mail;

class SendFeedbackCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  FeedbackCreated  $event
     * @return void
     */
    public function handle(FeedbackCreated $event)
    {
        Mail::to(config('mail.admin.address'))->send(
            new \App\Mail\Feedback\FeedbackCreated($event->feedback)
        );
    }
}

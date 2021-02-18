<?php

namespace App\Events\Feedbacks;

use App\Events\AbstractEvents;
use App\Models\Feedback\Feedback;

class FeedbackCreated extends AbstractEvents
{
    public Feedback $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }
}

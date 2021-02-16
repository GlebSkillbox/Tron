<?php

namespace App\Mail\Feedback;

use App\Mail\AbstractEmail;
use App\Models\Feedback\Feedback;

class FeedbackCreated extends AbstractEmail
{
    public Feedback $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.feedback.create');
    }
}

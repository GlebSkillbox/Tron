<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class AbstractEmail extends Mailable
{
    use Queueable, SerializesModels;
}

<?php

namespace App\Http\Resources\Message;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'body'         => $this->body,
            'sender_id'    => $this->sender_id,
            'recipient_id' => $this->recipient_id,
            'read'         => $this->read,
            'date_read'    => $this->date_read,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}

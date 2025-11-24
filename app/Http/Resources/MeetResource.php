<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'lead_id' => $this->lead_id,
            'meet_title' => $this->meet_title,
            'client_name'  => $this->client_name,
            'meeting_type' => $this->meeting_type,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'attachment' => $this->attachment,
            'meetAgenda' => $this->meetAgenda,
            'followUp' => $this->followUp,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}

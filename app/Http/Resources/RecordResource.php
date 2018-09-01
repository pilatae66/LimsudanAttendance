<?php

namespace App\Http\Resources;

use App\User;
use App\Http\Resources\RecordResource;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => (string)User::find($this->user_id)->fname . " " . User::find($this->user_id)->mname . " " . User::find($this->user_id)->lname,
            'type' => (string)$this->created_at->hour < 12 ? 'Morning ' . $this->type : 'Afternoon ' . $this->type,
            'time' => (string)$this->created_at->toDayDateTimeString(),
        ];
    }
}

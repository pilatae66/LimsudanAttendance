<?php

namespace App\Http\Resources;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
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
            'incident' => $this->incident,
            'user' => User::find($this->user_id)->fname . " " . User::find($this->user_id)->mname . " " . User::find($this->user_id)->lname,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}

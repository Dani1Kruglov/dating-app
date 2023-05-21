<?php

namespace App\Http\Resources\Message;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user1 = Users::where('id', $this->user_1_id)->first();
        $user2 = Users::where('id', $this->user_2_id)->first();
        return [
            'id'=> $this->id,
            'body'=>$this->body,
            'user_1_id'=>$user1->id,
            'user_2_id'=>$user2->id,
            'user_1_name'=>$user1->name,
            'user_2_name'=>$user2->name,
            'time'=>$this->created_at->diffForHumans(),
        ];
    }
}

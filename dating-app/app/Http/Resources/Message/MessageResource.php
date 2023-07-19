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
        if (isset($this['interlocutor_id'])){
            return [
                'interlocutor_id' => $this['interlocutor_id'],
                'interlocutor_name' => $this['interlocutor_name'],
                'interlocutor_image' => $this['interlocutor_image'],
            ];
        }

        $user1 = Users::where('id', $this->user_1_id)->first();
        $user2 = Users::where('id', $this->user_2_id)->first();
        return [
            'id'=> $this->id,
            'body'=>decrypt($this->body),
            'user_1_id'=>$user1->id,
            'user_2_id'=>$user2->id,
            'private_channel' => decrypt($this->private_channel),
            'hash_private_channel' => $this->private_channel,
            'user_1_name'=>$user1->name,
            'user_1_image' => $user1->image,
            'user_2_image' => $user2->image,
            'user_2_name'=>$user2->name,
            'time'=>$this->created_at->diffForHumans(),
        ];
    }
}

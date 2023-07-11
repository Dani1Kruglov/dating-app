<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use App\Models\Users;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::latest()->get();
        $messages = MessageResource::collection($messages)->resolve();
        return inertia('Message/Index', compact('messages'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        if ($data['user_1_id'] === auth()->user()->id){
            $user_1_id = $data['user_1_id'];
            $user_2_id = $data['user_2_id'];
        }elseif ($data['user_2_id'] === auth()->user()->id){
            $user_1_id = $data['user_2_id'];
            $user_2_id = $data['user_1_id'];
        }
        $message = Message::create([
            'user_1_id'=>$user_1_id,
            'user_2_id'=>$user_2_id,
            'body'=>encrypt($data['body']),
        ]);
        broadcast(new StoreMessageEvent($message))->toOthers();
        return MessageResource::make($message)->resolve();

    }

}

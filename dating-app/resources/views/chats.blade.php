@extends('layouts.app')

@section('content')

    <div class="row">
        @include('includes.sidebar')
        <div class="col" style="margin-top: 50px; margin-left: 70px;">
            <div class="container">
                <h1 class="mt-4 mb-4">My Chats</h1>
                <div class="row">
                    @foreach($chats as $chat)
                        <div class="col-md-4" style="width: 86%; height: 7%">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 10px">Chat with {{$chat->interlocutor_name}}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{route('messages', $chat->interlocutor_id)}}" class="btn btn-primary me-2" style="">View Chat</a>
                                        <img alt="" width="100" height="100" class="rounded-circle" src="{{asset('/storage/' .  $chat->interlocutor_image)}}" style="object-fit: cover; margin-bottom: 20px; margin-right: 12%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>


@endsection

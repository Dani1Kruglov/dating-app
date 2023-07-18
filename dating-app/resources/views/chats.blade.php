@extends('layouts.app')

@section('content')

    <div class="row">
        @include('includes.sidebar')
        <div class="col" style="margin-top: 50px; margin-left: 70px;">
            <div class="container">
                <h1 class="mt-4 mb-4">My Chats</h1>

                <div class="row">
                    @foreach($chats as $chat)
                        @if( $chat->user_1_id === auth()->user()->id)
                            <div class="col-md-4" style="width: 86%; height: 7%">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Chat with</h5>
                                        {{$chat->user_2_id}}
                                        <p class="card-text">This is chat 1.</p>
                                        <a href="{{route('messages', $chat->user_2_id)}}" class="btn btn-primary">View Chat</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-4" style="width: 86%; height: 7%">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Chat </h5>
                                        {{$chat->user_1_id}}
                                        <p class="card-text">This is chat 1.</p>
                                        <a href="{{route('messages', $chat->user_1_id)}}" class="btn btn-primary">View Chat</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

        </div>

    </div>


@endsection

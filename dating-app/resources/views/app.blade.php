@extends('layouts.app')

@section('vite')

@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
@inertiaHead

@endsection

@section('content')
    <div class="row">
        <div class="row" style="margin-left: 10px; margin-top: 100px">
            @inertia
        </div>
    </div>
@endsection

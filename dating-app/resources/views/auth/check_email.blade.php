@extends('layouts.app_log_register')

@section('content')
    <form action="{{route('check.account')}}" method="post" style="margin-left: 100px">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input  class="form-control" name="verified_email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Email должен содержать '@'</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Это мой email</label>
        </div>
        <button type="submit" class="btn btn-primary">Проверить</button>
    </form>
    @yield('modal')
@endsection

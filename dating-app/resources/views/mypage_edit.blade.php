@extends('layouts.app')

@section('content')
    <form class="row g-3 needs-validation" action="{{route('my.page.update', $user->id)}}" novalidate method="post" style="margin-left: 25%; margin-top: 80px">
        @csrf
        @method('patch')
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Имя</label>
            <input   type="text" class="form-control" name="name" id="validationCustom02" required value="{{$user->name}}">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="valid-feedback">
                Все хорошо!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Имя</label>
            <input   type="text" class="form-control" name="content" id="validationCustom02" required value="{{$user->content}}">
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="valid-feedback">
                Все хорошо!
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
        <div style="margin-top: 20px">
            <a href="{{route('my.page', auth()->user())}}">
                <button type="button" class="btn btn-info">Back</button>
            </a>
        </div>
    </form>
@endsection

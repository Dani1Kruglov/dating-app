@extends('layouts.app')

@section('content')
    <form class="row g-3 needs-validation" action="{{route('my.page.update', $user->id)}}" enctype="multipart/form-data" novalidate method="post" style="margin-left: 25%; margin-top: 80px">
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
            <label for="validationCustom02" class="form-label">О себе</label>
            <input   type="text" class="form-control" name="content" id="validationCustom02" required value="{{$user->content}}">
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="valid-feedback">
                Все хорошо!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Страна</label>
            <input   type="text" class="form-control" name="country" id="validationCustom02" required value="{{$user->country}}">
            @error('country')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="valid-feedback">
                Все хорошо!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Город</label>
            <input   type="text" class="form-control" name="city" id="validationCustom02" required value="{{$user->city}}">
            @error('city')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="valid-feedback">
                Все хорошо!
            </div>
        </div>
        <div class="input-group" style="margin-top: 50px; width: 800px">
            <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div style="margin-right: 10px ">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="imageDelete" id="option1" value="{{1}}" >
                <label class="form-check-label" for="option1">
                    Удалить фото
                </label>
            </div>
        </div>
        <select class="form-select" aria-label="Default select example" name="gender" id="validationCustom02" required value="{{$user->gender}}">
            <option value="male">Мужчина </option>
            <option value="female">Женщина</option>
        </select>
        <select class="form-select" aria-label="Default select example" name="family_status" id="validationCustom02" required value="{{$user->family_status}}">
            <option value="Свободен/на"> Свободен/на </option>
            <option value="Женат"> Женат </option>
            <option value="Замужем"> Замужем </option>
            <option value="В поиске"> В поиске </option>
        </select>
        <select multiple class="form-control" id="tags" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}"># {{$tag->title}}</option>
            @endforeach
        </select>

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

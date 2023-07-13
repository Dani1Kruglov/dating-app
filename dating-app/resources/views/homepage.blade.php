@extends('layouts.app')

@section('content')

    <div class="row">
        @include('includes.sidebar')
        <div class="col" style="margin-top: 50px; margin-left: 70px;">
            <div>
                @switch(auth()->user()->user_preferences)
                    @case('male')
                        @php($valWoman = '')
                        @php($valMan = 'checked')
                        @php($valAll = '')
                            @break
                            @case('female')
                                @php($valWoman = 'checked')
                                @php($valMan = '')
                                @php($valAll = '')
                                @break
                            @default
                                @php($valWoman = '')
                                @php($valMan = '')
                                @php($valAll = 'checked')
                            @endswitch


                            Искать:
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="male" id="flexRadioDefault1" {{$valMan}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Мужчину
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="female" id="flexRadioDefault1" {{$valWoman}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Женщину
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice" value="all" id="flexRadioDefault1" {{$valAll}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Без разницы
                    </label>
                </div>
                            <button type="button" class="filter-button btn btn-dark" style="margin-top: 4%">Сохранить</button>
            </div>
        </div>

        <div class="col" style="margin-left: 5%; margin-top: 50px">
            <div class="card" style="height: 650px; width: 400px;">
                <img src="https://i.pinimg.com/736x/df/6a/3f/df6a3f7f3023f8dfc4f6248ccedf268d.jpg" class="card-img-top"
                     style="height: 400px; width: 400px">
                <div class="card-body">
                    <h5 class="user-name">{{$user->name}}</h5>
                    <p class="user-bd">{{$user->birth_date}}</p>
                    <p class="user-content">{{$user->content}}</p>
                    <div style="margin-bottom: 10px">
                        <button class="dislike-button btn btn-outline-danger" type="submit" name="b1"  data-user-id="{{ $user->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak" viewBox="0 0 16 16">
                                <path d="M8.867 14.41c13.308-9.322 4.79-16.563.064-13.824L7 3l1.5 4-2 3L8 15a38.094 38.094 0 0 0 .867-.59Zm-.303-1.01-.971-3.237 1.74-2.608a1 1 0 0 0 .103-.906l-1.3-3.468 1.45-1.813c1.861-.948 4.446.002 5.197 2.11.691 1.94-.055 5.521-6.219 9.922Zm-1.25 1.137a36.027 36.027 0 0 1-1.522-1.116C-5.077 4.97 1.842-1.472 6.454.293c.314.12.618.279.904.477L5.5 3 7 7l-1.5 3 1.815 4.537Zm-2.3-3.06-.442-1.106a1 1 0 0 1 .034-.818l1.305-2.61L4.564 3.35a1 1 0 0 1 .168-.991l1.032-1.24c-1.688-.449-3.7.398-4.456 2.128-.711 1.627-.413 4.55 3.706 8.229Z"/>
                            </svg>
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 20px">
                            Tags
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tags</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin-top: 10px" class="flex">
                                            <div class="tag-container"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="like-button btn btn-outline-success" type="submit" data-user-id="{{ $user->id }}" style="margin-left: 50%">
                        <span class="PostBottomAction__icon _like_button_icon" aria-hidden="true"><div
                                class="PostButtonReactions__icon" data-section-ref="reactions-button-icon"
                                aria-label="Нравится" style=""><svg height="24" viewBox="0 0 24 24" width="24"
                                                                    xmlns="http://www.w3.org/2000/svg"><g fill="none"
                                                                                                          fill-rule="evenodd"><path
                                            d="M0 0h24v24H0z"></path><path
                                            d="M16 4a5.95 5.95 0 0 0-3.89 1.7l-.12.11-.12-.11A5.96 5.96 0 0 0 7.73 4 5.73 5.73 0 0 0 2 9.72c0 3.08 1.13 4.55 6.18 8.54l2.69 2.1c.66.52 1.6.52 2.26 0l2.36-1.84.94-.74c4.53-3.64 5.57-5.1 5.57-8.06A5.73 5.73 0 0 0 16.27 4zm.27 1.8a3.93 3.93 0 0 1 3.93 3.92v.3c-.08 2.15-1.07 3.33-5.51 6.84l-2.67 2.08a.04.04 0 0 1-.04 0L9.6 17.1l-.87-.7C4.6 13.1 3.8 11.98 3.8 9.73A3.93 3.93 0 0 1 7.73 5.8c1.34 0 2.51.62 3.57 1.92a.9.9 0 0 0 1.4-.01c1.04-1.3 2.2-1.91 3.57-1.91z"
                                            fill="currentColor" fill-rule="nonzero"></path></g></svg><div
                                    class="PostButtonReactions__iconAnimation"
                                    data-section-ref="reactions-button-icon-animation"></div></div></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('.like-button').on('click', function () {
                var userId = $(this).data('user-id');
                var currentButton = $(this);
                var user_preferences = $("input[name='choice']:checked").val();
                $.ajax({
                    url: "{{ route('likes.update', $user->id) }}".replace({{$user->id}}, userId),
                    method: "POST",
                    data: {
                        user: userId,
                        user_preferences: user_preferences,

                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {

                        var user = response.user;
                        var tags = response.tags;

                        var tagContainer = $('<div>');
                        tags.forEach(function (tag) {
                            var tagElement = $('<div class="tag-title">#' + tag.title + '</div>');
                            tagContainer.append(tagElement);
                        });

                        $('.tag-container').empty().append(tagContainer);

                        $('.user-name').text(user.name);
                        $('.user-bd').text(user.birth_date);
                        $('.user-content').text(user.content);
                        currentButton.data('user-id', user.id);
                    },
                    error: function (xhr, status, error) {
                        console.log(error)

                    }
                });
            });
            $('.dislike-button').on('click', function () {
                var userId = $(this).data('user-id');
                var currentButton = $(this);
                var user_preferences = $("input[name='choice']:checked").val();


                $.ajax({
                    url: "{{ route('dislikes.update', $user->id) }}".replace({{$user->id}}, userId),
                    method: "POST",
                    data: {
                        user: userId,
                        user_preferences: user_preferences,
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        var user = response.user;
                        var tags = response.tags;

                        var tagContainer = $('<div>');
                        tags.forEach(function (tag) {
                            var tagElement = $('<div class="tag-title">#' + tag.title + '</div>');
                            tagContainer.append(tagElement);
                        });

                        $('.tag-container').empty().append(tagContainer);
                        $('.user-name').text(user.name);
                        $('.user-bd').text(user.birth_date);
                        $('.user-content').text(user.content);
                        currentButton.data('user-id', user.id);
                    },
                    error: function (xhr, status, error) {
                        console.log(error)
                    }
                });
            });
            $('.filter-button').on('click', function () {
                var user_preferences = $("input[name='choice']:checked").val();
                var currentButton = $(this);
                $.ajax({
                    url: "{{ route('user_preferences.update')}}",
                    method: "POST",
                    data: {
                        user_preferences: user_preferences,

                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        var user = response.user;
                        var tags = response.tags;

                        var tagContainer = $('<div>');
                        tags.forEach(function (tag) {
                            var tagElement = $('<div class="tag-title">#' + tag.title + '</div>');
                            tagContainer.append(tagElement);
                        });

                        $('.tag-container').empty().append(tagContainer);

                        $('.user-name').text(user.name);
                        $('.user-bd').text(user.birth_date);
                        $('.user-content').text(user.content);
                        currentButton.data('user-id', user.id);
                    },
                    error: function (xhr, status, error) {
                        console.log(error)

                    }
                });
            });
        });

    </script>

@endsection

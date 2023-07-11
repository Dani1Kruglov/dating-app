@extends('layouts.app')

@section('content')

    <div class="row">
        @include('includes.sidebar')
        <div class="col" style="margin-top: 50px; margin-left: 70px;">
            <div>
                Искать:
                <form action="{{route('home')}}" method="post" style="width: 10%">
                    @csrf
                    <button type="submit" name="userFilter" class="btn btn-outline-dark me-2" value="female" style="margin-bottom: 5%">Девушку</button>
                    <button type="submit" name="userFilter" class="btn btn-outline-dark me-2" value="male" style="margin-bottom: 5%">Мужчину</button>
                    <button type="submit" name="userFilter" class="btn btn-outline-dark me-2" value="All" style="margin-bottom: 5%">Без разницы</button>
                </form>
            </div>
        </div>

        <div class="col" style="margin-left: 5%; margin-top: 50px">
            <div class="card" style="height: 650px; width: 400px;">
                <img src="https://i.pinimg.com/736x/df/6a/3f/df6a3f7f3023f8dfc4f6248ccedf268d.jpg" class="card-img-top" style="height: 400px; width: 400px">
                <div class="card-body">
                    <h5 class="user-name">{{$user->name}}</h5>
                    <p class="user-bd">{{$user->birth_date}}</p>
                    <p class="user-content">{{$user->content}}</p>

                    <button class="dislike-button btn btn-outline-danger" type="submit" name="b1"  data-user-id="{{ $user->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                            <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"></path>
                        </svg>
                    </button>
                    <button class="like-button btn btn-outline-success" type="submit" data-user-id="{{ $user->id }}" style="margin-left: 73%">
                        <span class="PostBottomAction__icon _like_button_icon" aria-hidden="true"><div class="PostButtonReactions__icon" data-section-ref="reactions-button-icon" aria-label="Нравится" style=""><svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"></path><path d="M16 4a5.95 5.95 0 0 0-3.89 1.7l-.12.11-.12-.11A5.96 5.96 0 0 0 7.73 4 5.73 5.73 0 0 0 2 9.72c0 3.08 1.13 4.55 6.18 8.54l2.69 2.1c.66.52 1.6.52 2.26 0l2.36-1.84.94-.74c4.53-3.64 5.57-5.1 5.57-8.06A5.73 5.73 0 0 0 16.27 4zm.27 1.8a3.93 3.93 0 0 1 3.93 3.92v.3c-.08 2.15-1.07 3.33-5.51 6.84l-2.67 2.08a.04.04 0 0 1-.04 0L9.6 17.1l-.87-.7C4.6 13.1 3.8 11.98 3.8 9.73A3.93 3.93 0 0 1 7.73 5.8c1.34 0 2.51.62 3.57 1.92a.9.9 0 0 0 1.4-.01c1.04-1.3 2.2-1.91 3.57-1.91z" fill="currentColor" fill-rule="nonzero"></path></g></svg><div class="PostButtonReactions__iconAnimation" data-section-ref="reactions-button-icon-animation"></div></div></span>
                    </button>

                    <div style="margin-top: 10px">
                        @foreach($tags as $tag)
                            <div class="tag-title">
                                # {{$tag->title}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('.like-button').on('click', function () {
                var userId = $(this).data('user-id');
                var currentButton = $(this);

                $.ajax({
                    url: "{{ route('likes.update', $user->id) }}".replace({{$user->id}}, userId),
                    method: "POST",
                    data: {
                        user: userId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        var user = response.user;
                        var tags = response.tags;
                        var tagContainer = $('.tag-title');
                        tagContainer.empty(); //массив тегов доработать
                        console.log(tags[0].title)
                        var tagElement = $('<div class="tag-title"># ' + tags[0].title + '</div>');
                        tagContainer.append(tagElement); // Добавить тэг в контейнер
                        $('.user-name').text(user.name);
                        $('.user-bd').text(user.birth_date);
                        $('.user-content').text(user.content);
                        currentButton.data('user-id', user.id);
                    },
                    error: function (xhr, status, error) {
                    }
                });
            });
            $('.dislike-button').on('click', function () {
                var userId = $(this).data('user-id');
                var currentButton = $(this);

                $.ajax({
                    url: "{{ route('dislikes.update', $user->id) }}".replace({{$user->id}}, userId),
                    method: "POST",
                    data: {
                        user: userId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        var user = response.user;
                        var tags = response.tags;
                        var tagContainer = $('.tag-title');//массив тегов доработать
                        tagContainer.empty();

                        tags.forEach(function(tag) {
                            var tagElement = $('<div class="tag-title"># ' + tag.title + '</div>');
                            tagContainer.append(tagElement);
                        });
                        $('.user-name').text(user.name);
                        $('.user-bd').text(user.birth_date);
                        $('.user-content').text(user.content);
                        currentButton.data('user-id', user.id);
                    },
                    error: function (xhr, status, error) {
                    }
                });
            });
        });

    </script>


@endsection

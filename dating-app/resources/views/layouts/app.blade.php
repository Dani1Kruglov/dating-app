<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body style="">
<header class="p-3 bg-dark text-white">
    <a href="{{route('home')}}">
        <img src="{{asset('images/logo.png')}}" width="250px" height="58px">
    </a>
    <div class="container">
        <div class="d-flex flex-wrap  justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-link px-2 text-white">Likes   {{auth()->user()->likes}}</li>
                <li class="nav-link px-2 text-white">Dislikes   {{auth()->user()->dislikes}}</li>
            </ul>

            <div class="dropdown" style="margin-left: 20px">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="https://sun9-45.userapi.com/impg/zWExPHeXVc_65219zmjjpCL1nnUd_L-KubnMVQ/5vTCq1OyoRA.jpg?size=1979x2160&quality=96&sign=a14d6474f26046615a90a0630bf9ce7d&type=album" alt="" width="32" height="32" class="rounded-circle me-2">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('my.page')}}">
                        My profile
                    </a>
                    <a class="dropdown-item" href="{{route('home')}}">
                        Back
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    @yield('content')
</div>


</body>

</html>

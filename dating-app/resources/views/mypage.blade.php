@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


<br><br><br>

<style>
    #real-estates-detail #author img {
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        -o-border-radius: 100%;
        border-radius: 100%;
        border: 5px solid #ecf0f1;
        margin-bottom: 10px;
    }
    #real-estates-detail .sosmed-author i.fa {
        width: 30px;
        height: 30px;
        border: 2px solid #bdc3c7;
        color: #bdc3c7;
        padding-top: 6px;
        margin-top: 10px;
    }
    .panel-default .panel-heading {
        background-color: #fff;
    }
    #real-estates-detail .slides li img {
        height: 450px;
    }
</style>

<div class="card" style="  background-color: #f2f2f2;
        padding: 20px;
        margin-left: 200px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        border-bottom: 4px solid #ddd;
        width: 80%;
       height: 50%">

    <div class="row" id="real-estates-detail">
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <header class="panel-title">
                        <div class="text-center">
                            <strong>Моя страница</strong>
                        </div>
                    </header>
                </div>
                <div class="panel-body">
                    <div class="text-center" id="author">
                        <img style="height: 300px; width: 300px" src="https://sun9-45.userapi.com/impg/zWExPHeXVc_65219zmjjpCL1nnUd_L-KubnMVQ/5vTCq1OyoRA.jpg?size=1979x2160&quality=96&sign=a14d6474f26046615a90a0630bf9ce7d&type=album">
                        <h3>{{$user->name}}</h3>
                        <p>{{$user->content}}</p>
                        <p class="sosmed-author">
                            <a href="#"><i class="fa fa-facebook" title="Facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter" title="Twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus" title="Google Plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin" title="Linkedin"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <ul id="myTab" class="nav nav-pills">
                        <div style="margin-top: 20px">
                            <a href="{{route('my.page.edit', $user->id) }}">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </a>
                        </div>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <hr>
                        <div class="tab-pane fade active in" id="detail">
                            <h4>История профиля</h4>
                            <table class="table table-th-block">
                                <tr>
                                <tr><td class="active">Зарегистрирован:</td><td>{{$user->created_at->toFormattedDateString()}}</td></tr>
                                <tr><td class="active">Страна:</td><td>{{$user->country}}</td></tr>
                                <tr><td class="active">Город:</td><td>{{$user->city}}</td></tr>
                                <tr><td class="active">Пол:</td><td>{{$user->gender}}</td></tr>
                                <tr><td class="active">Полных лет:</td><td>{{$user->age}}</td></tr>
                                <tr><td class="active">Семейное положение:</td><td>{{$user->family_status}}</td></tr>
                                <tr><td class="active">Рейтинг пользователя:</td><td>
                                        @for($i = 0; $i < $rating; $i++)
                                            <i class="fa fa-star" style="color:red"></i>
                                        @endfor
                                            {{$rating}}
                                    </td>
                                </tr>
                                <tr><td class="active">Верификация email</td><td>{{$verification}}</td></tr>
                                <tr><td class="active">Теги</td>
                                    <td>
                                @foreach($tags as $tag)
                                        # {{$tag->title}}
                                @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact">
                            <p></p>
                            <form role="form">
                                <div class="form-group">
                                    <label>Ваше имя</label>
                                    <input type="text" class="form-control rounded" placeholder="Укажите Ваше Имя">
                                </div>
                                <div class="form-group">
                                    <label>Ваш телефон</label>
                                    <input type="text" class="form-control rounded" placeholder="(+7)(095)123456">
                                </div>
                                <div class="form-group">
                                    <label>E-mail адрес</label>
                                    <input type="email" class="form-control rounded" placeholder="Ваш Е-майл">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Согласен с условиями
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Текст Вашего сообщения</label>
                                    <textarea class="form-control rounded" style="height: 100px;"></textarea>
                                    <p class="help-block">Текст сообщения будет отправлен пользователю</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" data-original-title="" title="">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{route('my.page.destroy', auth()->user()->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    Удалить аккаунт
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('auth.check_email')

@section('modal')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="margin-top: 50px; margin-left: 100px; width: 400px;height: 70px">
        Аккаунт с такой почтой найден
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Восстановление аккаунта</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$message}}
                </div>
                <div class="modal-footer">
                    <form action="{{route('force.delete.account')}}" method="post">
                        <button class="btn btn-secondary" type="submit"  name="email" value="{{$email}}">@csrfСоздать новый аккаунт</button>
                    </form>
                    <form action="{{route('restore.account')}}" method="post">
                        <button type="submit" class="btn btn-primary" name="email" value="{{$email}}">@csrfВосстановить прежний аккаунт</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @yield('toast')
@endsection

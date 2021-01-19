@extends('layouts.app')
@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-8"><h3>Edit user {{$user->name}}</h3></div>
    </div>
    <form action="{{route('users.update', $user->id)}}" id="form" method="post">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control name" value="{{$user->name}}" name="name" placeholder="Имя">
            </div>
            <div class="col">
                <input type="text" class="form-control last_name" value="{{$user->last_name}}" name="last_name" placeholder="Фамилия">
            </div>
            <div class="col">
                <input type="text" class="form-control email" value="{{$user->email}}" name="email" placeholder="Почта">
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-success submit-form">Сохранить</button>
    </form>
</div>
<script src="{{asset('/js/users/update.js')}}"></script>
@endsection

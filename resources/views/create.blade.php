@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-8"><h3>Create user</h3></div>
    </div>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <input type="text" class="form-control name" value="{{old('name')}}" name="name" placeholder="Имя">
            </div>
            <div class="col">
                <input type="text" class="form-control last_name" value="{{old('last_name')}}" name="last_name" placeholder="Фамилия">
            </div>
            <div class="col">
                <input type="text" class="form-control email" value="{{old('email')}}" name="email" placeholder="Почта">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" id="submit-form">Сохранить</button>
    </form>
</div>
{{--<script src="{{asset('/js/users/create.js')}}"></script>--}}
@endsection

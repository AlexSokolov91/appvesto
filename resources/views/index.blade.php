@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-8 col-sm-6"><h3>Users</h3></div>
        <div class="col-12" style="margin-top: 15px"><a href="{{route('users.create')}}" class="btn btn-success">Create</a></div>
    </div>
        <div class="table-responsive">
            <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="25%">Name</th>
                    <th width="25%">Last name</th>
                    <th width="25%">Email</th>
                    <th width="25%">Actions</th>
                    </th>
                </tr>
                </thead>
            </table>
        </div>
</div>
<script src="{{asset('/js/dataTable.js')}}"></script>
@endsection

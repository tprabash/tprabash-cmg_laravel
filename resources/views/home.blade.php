@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data">
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->date_of_birth}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="btn-collapse text-center">
                                <a href="/update/{{$user->id}}" class="btn btn-primary">Update</a>
                                <a href="/delete/{{$user->id}}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/create" class="btn btn-primary">Add User</a>
        </div>
    </div>
</div>

@endsection

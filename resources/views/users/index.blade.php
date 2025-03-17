@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @session('success')
                <div class="alert alert-success">{{$value}} </div>
                @endsession

                <div class="card-body">
                    <a href="{{route('users.create')}}" class="btn btn-success mb-3">Create user</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role)
                                    {{$role}},
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('users.show', $user->id)}}" class="btn btn-info btn-sm">Show</a>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
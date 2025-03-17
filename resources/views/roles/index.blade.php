@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>
                @session('success')
                <div class="alert alert-success">{{$value}} </div>
                @endsession

                <div class="card-body">
                    @can('role-create')
                    <a href="{{route('roles.create')}}" class="btn btn-success mb-3">Create Role</a>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Permissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td width=60px>{{$role->id}}</td>
                                <td width=400px>{{$role->name}}</td>
                                <td>
                                    <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('roles.show', $role->id)}}" class="btn btn-info btn-sm">Show</a>
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
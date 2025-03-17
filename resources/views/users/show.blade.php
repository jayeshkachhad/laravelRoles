@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show User') }}</div>

                <div class="card-body">
                    <a href="{{route('users.index')}}" class="btn btn-info mb-5">Back</a>

                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Email :</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Password :</la bel>
                                <input type="password" name="password" class="form-control" value="{{$user->password}}">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>

                        <div class="mt-2">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
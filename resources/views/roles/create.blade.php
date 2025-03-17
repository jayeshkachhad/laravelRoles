@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create role') }}</div>

                <div class="card-body">
                    <a href="{{route('roles.index')}}" class="btn btn-info mb-5">Back</a>

                    <form action="{{route('roles.store')}}" method="post">
                        @csrf
                        <div class="mt-2">
                            <label for="">Name :</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <h3>Permissions</h3>
                            @foreach($permissions as $permission)
                            <label>
                                <input type="checkbox" name="permissions[{{$permission->name}}]" value="{{$permission->name}}">
                                {{$permission->name}}
                            </label>
                            <br>
                            @endforeach
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
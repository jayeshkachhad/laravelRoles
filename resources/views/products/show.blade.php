@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Products') }}</div>

                <div class="card-body">
                    <a href="{{route('products.index')}}" class="btn btn-info mb-5">Back</a>

                    <form action="{{route('products.update', $product->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            @error('name')
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
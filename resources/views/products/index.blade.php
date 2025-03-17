@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                @session('success')
                <div class="alert alert-success">{{$value}} </div>
                @endsession

                <div class="card-body">
                    @can('product-create')
                    <a href="{{route('products.create')}}" class="btn btn-success mb-3">Create product</a>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('product-edit')
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        @endcan
                                        @can('product-list')
                                        <a href="{{route('products.show', $product->id)}}" class="btn btn-info btn-sm">Show</a>
                                        @endcan
                                        @can('product-delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                        @endcan
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
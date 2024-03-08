@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Product') }}</div>
                    <div class="card-body">
                        @if (session('delete-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('delete-success') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product material</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($products) && count($products) > 0)
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->getCategory->cat_name }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/product-images') }}/{{ $item->product_image }}" alt="" class="img-fluid" style="width: 100px">
                                            </td>
                                            <td>
                                                {{ $item->material }}
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('product.delete', $item->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

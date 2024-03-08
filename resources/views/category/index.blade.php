@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Add Category') }}</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <label for="" class="mb-4"><b>Enter Category Name</b></label>
                            <input type="text" name="cat_name" placeholder="Enter Category Name" required class="form-control mb-4">
                            <label for="" class="mb-4"><b>Enter Page Url</b></label>
                            <input type="text" name="page_url" placeholder="Enter Page Name" required class="form-control mb-4">
                            <input type="submit" class="form-control btn btn-primary" value="Save Category">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Category') }}</div>
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
                                    <th>Page Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($categories) && count($categories) > 0)
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->cat_name }}</td>
                                            <td>{{ $item->page_url }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found.</
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

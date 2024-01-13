@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Product') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($prodcuts) && count($prodcuts) > 0)
                                    @foreach ($prodcuts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->cat_name }}</td>
                                            <td>{{ $item->status }}</td>
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

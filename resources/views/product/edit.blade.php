@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>
                    <div class="card-body bordered">
                        <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" id="">
                            <div class="col-md-6">
                                <label for="ProductCategory" class="form-label">Product Category</label>
                                <select class="form-control" id="ProductCategory" name="category_id" required>
                                    <option selected disabled value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected':'' }}>{{ $item->cat_name }}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select a product category.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" name="product_name" id="product_name" required class="form-control" value="{{ $product->product_name ?? '' }}" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select a product name.
                                </div>
                            </div>
                            <div class="col-md-10">
                                <label for="product_image" class="form-label">Product Image</label>
                                <input type="file" name="product_image" id="product_image" class="form-control" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a product image.
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('uploads/product-images') }}/{{ $product->product_image }}" alt="" class="img-fluid" style="width: 200px">
                            </div>
                            <div class="col-md-10">
                                <label for="dimension_image" class="form-label">Product dimension Image</label>
                                <input type="file" name="dimension_image" id="dimension_image"
                                    class="form-control" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a dimension image.
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('uploads/product-images') }}/{{ $product->dimension_image }}" alt="" class="img-fluid" style="width: 200px">
                            </div>
                            <div class="col-md-10">
                                <label for="application_image" class="form-label">Product application Image</label>
                                <input type="file" name="application_image" id="application_image"
                                    class="form-control" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a application image.
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('uploads/product-images') }}/{{ $product->application_image }}" alt="" class="img-fluid" style="width: 200px">
                            </div>
                            <div class="col-md-10">
                                <label for="usage_image" class="form-label">Product usage Image</label>
                                <input type="file" name="usage_image" id="usage_image" class="form-control" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a usage image.
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('uploads/product-images') }}/{{ $product->usage_image }}" alt="" class="img-fluid" style="width: 200px">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

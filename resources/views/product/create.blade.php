@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>
                    <div class="card-body bordered">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="ProductCategory" class="form-label">Product Category</label>
                                <select class="form-control" id="ProductCategory" name="category_id" required>
                                    <option selected disabled value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select a product category.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" name="product_name" id="product_name" required class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select a product name.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="product_image" class="form-label">Product Image</label>
                                <input type="file" name="product_image" id="product_image" class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a product image.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="material" class="form-label">Product material</label>
                                <input type="text" name="material" id="material" required class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a material.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="package" class="form-label">Product package</label>
                                <select multiple="multiple" name="package[]" id="package" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a package.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="brand" class="form-label">Product brand</label>
                                <input type="text" name="brand" id="brand" required class="form-control">
                                </input>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide brand.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="size_height" class="form-label">Product size (Height)</label>
                                <select multiple="multiple" name="size_height[]" id="size_height" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select size (Height).
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="size_length" class="form-label">Product size (Length)</label>
                                <select multiple="multiple" name="size_length[]" id="size_length" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select size (Height).
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="color" class="form-label">Product color</label>
                                <select multiple="multiple" name="color[]" id="color" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select color.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="product_application" class="form-label">Product Application</label>
                                <select multiple="multiple" name="product_application[]" id="product_application" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select Product Application.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="applications" class="form-label">Product Applications</label>
                                <select multiple="multiple" name="applications[]" id="applications" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select Product Applications.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="features" class="form-label">Product features</label>
                                <select multiple="multiple" name="features[]" id="features" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select Product features.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="delivery_time" class="form-label">Product deleviry time</label>
                                <input type="text" name="delivery_time" id="delivery_time" required class="form-control">
                                </input>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide deleviry time.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="benefits" class="form-label">Product benefits</label>
                                <select multiple="multiple" name="benefits[]" id="benefits" required
                                    class="form-control select2 mySelect">
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select Product benefits.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dimension_image" class="form-label">Product dimension Image</label>
                                <input type="file" name="dimension_image" id="dimension_image" class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a dimension image.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="application_image" class="form-label">Product application Image</label>
                                <input type="file" name="application_image" id="application_image" class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a application image.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="usage_image" class="form-label">Product usage Image</label>
                                <input type="file" name="usage_image" id="usage_image" class="form-control" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a usage image.
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        $(document).ready(function() {
            $('.mySelect').select2();

            $('.mySelect').each(function() {
                var $select = $(this);
                $select.select2();
                $select.on('select2:open', function() {
                    $('.select2-container--open .select2-search__field').on('keyup', function(
                        event) {
                        var searchTerm = $(this).val().trim();
                        if (event.key === 'Enter' && searchTerm) {
                            var newOption = new Option(searchTerm, searchTerm, true, true);
                            $select.append(newOption).trigger('change');
                            $(this).val('');
                            $('.select2-results__message').css('display', 'none');
                            $select.select2('close');
                        }
                    });
                });

                $select.select2();
            });
        });
    </script>
@endsection

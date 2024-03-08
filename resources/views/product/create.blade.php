@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>
                    <div class="card-body bordered">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                                <input type="file" name="product_image" id="product_image" class="form-control" required />
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
                                <label for="color_text" class="form-label">Product color text</label>
                                <input type="text" class="form-control" name="color_text">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select text.
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
                                <label for="product_application" class="form-label">Product Application</label>
                                <input type="text" class="form-control" name="product_application" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select Product Application.
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
                                <label for="color" class="form-label">Product color</label>
                                <select multiple="multiple" name="color[]" id="color"
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
                                <label for="color_type" class="form-label">Product color type</label>
                                <select name="color_type" id="color_type" class="form-control">
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select color.
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <label for="usage_image" class="form-label">Product usage Image</label>
                                <input type="file" name="usage_image" id="usage_image" class="form-control" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a usage image.
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row clone_row">
                                    <div class="col-5">
                                        <label for="size_height" class="form-label">Product size height</label>
                                        <input type="text" name="size[]" class="form-control" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a usage image.
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <label for="size_height" class="form-label">Product size length</label>
                                        <input type="text" name="size[]" class="form-control" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a usage image.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-warning mt-4 add-more">+</a>

                                    </div>
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
    @push('scripts')
        <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('select2.min.js') }}"></script>

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
        <script>
            $(document).ready(function() {
                var maxFields = 100;
                var wrapper = $(".clone_row");
                var addButton = $(".add-more");
                var removeButton = '<a href="javascript:void(0)" class="btn btn-danger mt-4 remove-more">-</a>';
                var x = 1;
                $(addButton).click(function(e) {
                    e.preventDefault();
                    if (x < maxFields) {
                        x++;
                        var clonedRow = wrapper.clone();
                        clonedRow.removeClass('clone_row').addClass('cloned_row_' + x);
                        clonedRow.find('.add-more').replaceWith(removeButton);
                        wrapper.after(clonedRow);
                    }
                });
                $('body').on("click", ".remove-more", function(e) {
                    // console.log("hello")
                    e.preventDefault();
                    // console.log(x)
                    // $(this).closest('.cloned_row_' + x).remove();
                    $('.cloned_row_' + x).remove();
                    x--;
                });
            });
        </script>
    @endpush
@endsection

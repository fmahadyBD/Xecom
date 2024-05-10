@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Add Sub Product</h2>
                        </div>
                        <div class="card-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Select Category :</label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="categoryId" class="form-control">
                                            <option value="" disabled="" selected>Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Sub Category :</label>
                                    <div class="col-md-8">
                                        <select name="subcategory_id" id="subCategoryId" class="form-control">
                                            <!-- Adjusted name attribute -->
                                            <option value="" disabled="" selected>Select One</option>
                                            @foreach ($SubCategories as $SubCategory)
                                                <option value="{{ $SubCategory->id }}">{{ $SubCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Description :</label>
                                    <div class="col-md-8">
                                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Image :</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control-file" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Status :</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1">
                                            Published</label>
                                        <label for=""><input type="radio" name="status" value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="New Category" class="btn btn-outline-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('admin-js')
    <script>
        function toggleSubCategoryDropdown(enable) {
            if (enable) {
                $('#subCategoryId').prop('disabled', false);
            } else {
                $('#subCategoryId').prop('disabled', true);
                n
                $('#subCategoryId').val('').change();
            }
        }

        $(document).on("change", '#categoryId', function() {
            var categoryId = $(this).val();
            if (categoryId) {

                toggleSubCategoryDropdown(true);
                $.ajax({
                    url: '/getSubCategory/' + categoryId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        var options = '<option value="" disabled="" selected>Select One</option>';
                        $.each(res, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.name +
                                '</option>';
                        });
                        $('#subCategoryId').html(options);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            } else {

                toggleSubCategoryDropdown(false);
            }
        });

        $(document).ready(function() {
            toggleSubCategoryDropdown(false);
        });
    </script>
@endsection

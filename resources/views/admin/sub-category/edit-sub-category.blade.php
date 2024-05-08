@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Edit Sub Category</h2>
                        </div>
                        <div class="card-body">

                            <form action="{{route('update-subCategory')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$subCategories->id}}">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{$subCategories->name}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Parent Category Name :</label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" disabled="" selected>Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Description :</label>
                                    <div class="col-md-8">
                                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$subCategories->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Image :</label>
                                    <div class="col-md-8">
                                        <img src="{{asset($subCategories->image)}}" style="height: 100px; weight:100px" alt="Iamge">
                                        <input type="file" name="image" class="form-control-file" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Status :</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" {{$subCategories->status==1?'checked': ''}} value="1"> Published</label>
                                        <label for=""><input type="radio" name="status" {{$subCategories->status==0?'checked': ''}} value="0"> Unpublished</label>
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
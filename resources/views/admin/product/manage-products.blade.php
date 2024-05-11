@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>All Products</h2>
                        </div>
                        <div class="card-body">
                            <div class="page-content fade-in-up">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">Data Table</div>
                                    </div>
                                    <div class="ibox-body">
                                        <table class="table table-striped table-bordered table-hover" id="example-table"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>SubCategory</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>

                                                        <td>{{ $loop->iteration }}</td>

                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->subcategory->name }}</td>
                                                        <td>{{ optional(optional($product->subCategory)->category)->name }}</td>
                                                        <td>{{$product->description}}</td>

                                                        <td><img src="{{asset($product->image)}}" style="height: 100px; width:100px" alt=""></td>
                                                        <td>{{$product->status==1?'publish':'unpublish'}}</td>
                                                        <td>
                                                            <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-primary">Edit</a>
                                                            <a href="{{route('delete-product',['id'=>$product->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

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
                </div>
            </div>
        </div>
    </section>
@endsection

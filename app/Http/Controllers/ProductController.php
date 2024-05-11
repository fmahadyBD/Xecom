<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    function addProduct()
    {
        $categories = Category::all();
        $SubCategories = SubCategory::all();
        return view('admin.product.add-product', [
            'SubCategories' => $SubCategories,
            'categories' => $categories,

        ]);
    }

    function store(Request $request)
    {
        // dd($request);
        Product::newProduct($request);
        return redirect()->back()->with('message', 'Add new Product Successfully!');
    }
    function manageProduct(){
        // $categories=Category::all();
        $products=Product::all();
        return view('admin.product.manage-products',['products'=>$products]);
    }
    function deleteProduct($id){
        $this->product=Product::find($id);


        $this->product->delete();
        if(file_exists($this->product->image)){
            unlink($this->product->image);
        }
        return redirect()->back()->with('messsage','Delete this product');

    }
    function editProduct($id){

        return view('admin.product.edit-product',[
            'product'=>Product::find($id),
            'categories'=>Category::all(),
            'subCategories'=>SubCategory::all(),
        ]);


    }



    public function updateProduct(Request $request){
        // dd($request);

        Product::updateProduct($request);
        return redirect()->back()->with('message','product updatte seccussfully');
    }
}

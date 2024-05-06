<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function newCategory(Request $request){

       Category::newCategory($request);

        return redirect()->back()->with('message','Add new Category Successfully!');
    }
    public function manageCategory(){
        return view('admin.category.manage-category');
    }
    public function edit($id){
        return view('admin.category.edit-category');
    }

    public function updateCategory(Request $request){

        return redirect('/update-category')->with('message','Update category successfully!');
    }

    public function delete($id){

        return redirect()->back()->with('message','Delete Category Successfully!');
    }

}

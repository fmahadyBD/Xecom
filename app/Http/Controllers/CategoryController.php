<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categories;
    protected $category;
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    public function newCategory(Request $request)
    {

        Category::newCategory($request);

        return redirect()->back()->with('message', 'Add new Category Successfully!');
    }
    public function manageCategory()
    {
        $this->categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.manage-category', ['categories' => $this->categories]);
    }
    public function edit($id)
    {

        return view('admin.category.edit-category', ['category' => Category::find($id)]);
    }

    public function updateCategory(Request $request)
    {
        Category::updateCategory($request);

        return redirect('/manage-category')->with('message', 'Update category successfully!');
    }

    public function delete($id)
    {

        $this->category = Category::find($id);
        if (file_exists($this->category->image)) {
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect()->back()->with('message', 'Delete Category Successfully!');
    }
}

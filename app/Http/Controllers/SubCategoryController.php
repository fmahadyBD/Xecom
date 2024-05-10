<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategories;
    protected $subCategory;
    public function addSubCategory()
    {
        return view('admin.sub-category.add-sub-category',['categories'=>Category::all()]);
    }
    public function newSubCategory(Request $request)
    {
        // dd($request);

        SubCategory::newSubCategory($request);

        return redirect()->back()->with('message', 'Add new SubCategory Successfully!');
    }
    public function manageSubCategory()
    {

        $this->subCategories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.sub-category.manage-sub-category', ['subCategories' => $this->subCategories]);
    }
    public function edit($id)
    {
        return view('admin.sub-category.edit-sub-category',[
            'subCategories'=>SubCategory::find($id),'categories'=>Category::all()

        ]);
    }

    public function updateSubCategory(Request $request)
    {
        // dd($request);
        SubCategory::updateSubCategory($request);

        return redirect('/manage-subCategory')->with('message', 'Update SubCategory successfully!');
    }

    public function delete($id)
    {

        $this->subCategory = SubCategory::find($id);
        if (file_exists($this->subCategory->image)) {
            unlink($this->subCategory->image);
        }
        $this->subCategory->delete();
        return redirect()->back()->with('message', 'Delete SubCategory Successfully!');
    }

    //ajax
    public function getSubCategory($id) {
        $this->subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json($this->subCategory);
    }

}

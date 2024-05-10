<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addProduct()
    {
        $categories = Category::all();
        $SubCategories = SubCategory::all();
        return view('admin.product.add-sub-product', [
            'SubCategories' => $SubCategories,
            'categories' => $categories,

        ]);
    }
}

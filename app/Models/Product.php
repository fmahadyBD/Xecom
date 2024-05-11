<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'category_id',
        'subcategory_id', 'description', 'image', 'status'

    ];

    protected static $subCategory;
    protected static $name;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;
    protected static $category;
    protected static $image;
    protected static $product;
    protected static $description;

    public static function saveImage($request)
    {

        self::$image = $request->file('image');
        self::$imageName = 'product-name' . time() . '.' . self::$image->getClientOriginalExtension();
        self::$imageDirectory = 'product-image/';
        self::$image->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory . self::$imageName;
    }

    public static    function  newProduct($request)
    {
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->description = $request->description;
        self::$product->status = $request->status;


        self::$product->image = self::saveImage($request);
        self::$product->save();
    }
    function subcategory()
    {

        return $this->belongsTo('App\Models\SubCategory');
    }

    public static function updateProduct($request)
    {
        self::$product = Product::find($request->product_id);

        if ($request->hasFile('image')) {

            if (!empty(self::$product->image) && file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::saveImage($request);
        } else {
            self::$imageUrl = self::$product->image ?? null;
        }
        self::$product->name = $request->name;
        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->description = $request->description;
        self::$product->status = $request->status;
        self::$product->image = self::$imageUrl;
        self::$product->save();
    }

}

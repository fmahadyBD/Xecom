# What I learn from this project

-   The Topic's name: \*

*   [One-to-One Table Relation ](#one-to-one-table-relation)
*   [Subcategory by the Category](#Subcategory-by-the-Category)
*   [Globar data by AppProvider](#Globar-data-by-AppProvider)

## One-to-One Table Relation

### Overview

In this README, we will discuss the one-to-one table relation between two tables: `Subcategory` and `Category`. Specifically, we will focus on how the `category` function within the `Subcategory` model establishes this relation.

## Relation Description

The relation between the `Subcategory` and `Category` tables is established as a one-to-one relationship. Each `Subcategory` belongs to one `Category`, and each `Category` can have only one associated `Subcategory`.

## Implementation Details

### Relation Setup

To establish the one-to-one relationship, we utilize Laravel's Eloquent ORM. Within the `Subcategory` model, the `category` function is defined to specify the relation.

```php
public function category()
{
    return $this->belongsTo('App\Models\Category');
}
```

### Usage

When accessing a `Subcategory` instance, you can retrieve its associated `Category` using the `category` function. For example:

```php
$subCategory = Subcategory::find($id);
$category = $subCategory->category;
```

### Blade file:

```
@foreach($subcategories as $subCategory)
    <li>
        Subcategory Name: {{ $subCategory->name }} <br>
        Category Name: {{ $subCategory->category->name }}
    </li>
 @endforeach
```

This retrieves the `Category` object related to the `$subCategory`.

### Context

-   **$subCategory**: This variable represents an instance of the `Subcategory` class, typically used within a loop or retrieved from the database.
-   **category**: Within the `Subcategory` model, `category` refers to the function that establishes the relation with the `Category` table.
-   **belongsTo()**: This method specifies that the `Subcategory` table has a foreign key referencing the `Category` table.

## Conclusion

In summary, the `category` function within the `Subcategory` model enables the establishment of a one-to-one table relation between the `Subcategory` and `Category` tables in Laravel. By utilizing Eloquent's built-in methods, developers can easily navigate and work with related data in their applications.






## Subcategory by the Category

### Loading Data in Controller
```php
// Load the blade file to load the data
function addProduct()
{
    $categories = Category::all();
    $SubCategories = SubCategory::all();
    return view('admin.product.add-sub-product', [
        'SubCategories' => $SubCategories,
        'categories' => $categories,
    ]);
}
```

### Dropdown Menu
```html
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
```

### JavaScript (yield() in master)
```javascript
@section('admin-js')
<script>
    function toggleSubCategoryDropdown(enable) {
        if (enable) {
            $('#subCategoryId').prop('disabled', false);
        } else {
            $('#subCategoryId').prop('disabled', true);
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
```

### Route for Asynchronous Call
```php
Route::get('/getSubCategory/{id}',[SubCategoryController::class,'getSubCategory'])->name('getSubCategory');
```

### Controller Function
```php
public function getSubCategory($id) {
    $this->subCategory = SubCategory::where('category_id', $id)->get();
    return response()->json($this->subCategory);
}




## Globar data by AppProvider

### AppProvider Code

```php
public function boot(): void
{
    View::composer(['front.includes.header'], function ($view) {
        $view->with('categoriesH', Category::where('status', 1)->get());
    });
}
```

### Blade File Changes

```html
<li><a href="{{ route('category-page') }}">Category</a>
    <ul class="sub-menu-style">
        @foreach ($categoriesH as $category)
            <li><a href="{{ route('category-page') }}"> {{ $category->name }}</a></li>
        @endforeach
    </ul>
</li>


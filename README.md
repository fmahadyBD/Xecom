# What I learn from here
* The Topic's name: * 
- [One-to-One Table Relation ](#One-to-One Table )




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

This retrieves the `Category` object related to the `$subCategory`.

### Context

- **$subCategory**: This variable represents an instance of the `Subcategory` class, typically used within a loop or retrieved from the database.
- **category**: Within the `Subcategory` model, `category` refers to the function that establishes the relation with the `Category` table.
- **belongsTo()**: This method specifies that the `Subcategory` table has a foreign key referencing the `Category` table.

## Conclusion

In summary, the `category` function within the `Subcategory` model enables the establishment of a one-to-one table relation between the `Subcategory` and `Category` tables in Laravel. By utilizing Eloquent's built-in methods, developers can easily navigate and work with related data in their applications.



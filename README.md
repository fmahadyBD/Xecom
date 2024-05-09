- [One-to-One Table Relation ](#one-to-one-table-relation)
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

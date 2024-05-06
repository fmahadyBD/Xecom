<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\XecomController;
use Illuminate\Support\Facades\Route;



Route::get('/',[XecomController::class,'index'])->name('/');
Route::get('/category-page',[XecomController::class,'categoryPage'])->name('category-page');
Route::get('/product-detailes',[XecomController::class,'productDetailes'])->name('product-detailes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {




    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');


    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add-category');
    Route::post('/new-category',[CategoryController::class,'newCategory'])->name('new-category');

    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage-category');
    Route::get('/edit-category{$id}',[CategoryController::class,'edit'])->name('edit-category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update-category');
    Route::get('/delete-category{$id}',[CategoryController::class,'delete'])->name('delete-category');


});

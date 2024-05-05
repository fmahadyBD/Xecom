<?php

use App\Http\Controllers\AdminController;
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



    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

});

<?php

use App\Http\Controllers\front\XecomController;
use Illuminate\Support\Facades\Route;



Route::get('',[XecomController::class,'index'])->name('index');

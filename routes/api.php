<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

// Dashboard All API Route Start

// Brand Api Route Start
Route::get("/brand-list", [BrandController::class, 'BrandList'])->middleware('auth:sanctum');
Route::post("/create-brand", [BrandController::class, 'BrandCreate'])->middleware('auth:sanctum');

// Brand Api Route End

// Category Api Route Start

Route::get("/category-list", [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');
Route::post("/create-category", [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');

// Category Api Route End




// Dashboard All API Route End

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuprilerController;
use App\Http\Controllers\WarehouseController;

// Dashboard All API Route Start

// Brand Api Route Start
Route::get("/brand-list", [BrandController::class, 'BrandList'])->middleware('auth:sanctum');
Route::post("/create-brand", [BrandController::class, 'BrandCreate'])->middleware('auth:sanctum');
Route::post("/brand-by-id", [BrandController::class, 'BrandById'])->middleware('auth:sanctum');
Route::post("/update-brand", [BrandController::class, 'BrandUpdate'])->middleware('auth:sanctum');
Route::post("/delete-brand", [BrandController::class, 'BrandDelete'])->middleware('auth:sanctum');
// Brand Api Route End

// Category Api Route Start

// Route::get("/ajx-category-list", [CategoryController::class, 'AJXCategoryList'])->middleware('auth:sanctum');
Route::get("/category-list", [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');
Route::post("/create-category", [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');
Route::post("/category-by-id", [CategoryController::class, 'CategoryByID'])->middleware('auth:sanctum');
Route::post("/update-category", [CategoryController::class, 'CategoryUpdate'])->middleware('auth:sanctum');
Route::post("delete-category", [CategoryController::class, 'CategoryDelete'])->middleware('auth:sanctum');

// Category Api Route End


//Unit  Api Route Start

Route::get("/unit-list", [UnitController::class, 'UnitList'])->middleware('auth:sanctum');
Route::post("/create-unit", [UnitController::class, 'UnitCreate'])->middleware('auth:sanctum');
Route::post("/unit-by-id", [UnitController::class, 'UnitByID'])->middleware('auth:sanctum');
Route::post("/update-unit", [UnitController::class, 'UnitUpdate'])->middleware('auth:sanctum');
Route::post("delete-unit", [UnitController::class, 'UnitDelete'])->middleware('auth:sanctum');

// Unit Api Route End




//Supriler  Api Route Start

Route::get("/supriler-list", [SuprilerController::class, 'SuprilerList'])->middleware('auth:sanctum');
Route::post("/create-supriler", [SuprilerController::class, 'SuprilerCreate'])->middleware('auth:sanctum');
Route::post("/supriler-by-id", [SuprilerController::class, 'SuprilerByID'])->middleware('auth:sanctum');
Route::post("/update-supriler", [SuprilerController::class, 'SuprilerUpdate'])->middleware('auth:sanctum');
Route::post("/delete-supriler", [SuprilerController::class, 'SuprilerDelete'])->middleware('auth:sanctum');

// Supriler Api Route End





//Product  Api Route Start

Route::get("/product-list", [ProductController::class, 'ProductList'])->middleware('auth:sanctum');
Route::post("/create-product", [ProductController::class, 'ProductCreate'])->middleware('auth:sanctum');
Route::post("/product-by-id", [ProductController::class, 'ProductByID'])->middleware('auth:sanctum');
Route::post("/update-product", [ProductController::class, 'ProductUpdate'])->middleware('auth:sanctum');
Route::post("/delete-product", [ProductController::class, 'ProductDelete'])->middleware('auth:sanctum');

// Product Api Route End





// Warehouse Api Route Start

Route::get("/warehouse-list", [WarehouseController::class, 'WarehouseList'])->middleware('auth:sanctum');
Route::post("/create-warehouse", [WarehouseController::class, 'WarehouseCreate'])->middleware('auth:sanctum');
Route::post("/warehouse-by-id", [WarehouseController::class, 'WarehouseByID'])->middleware('auth:sanctum');
Route::post("/update-warehouse", [WarehouseController::class, 'WarehouseUpdate'])->middleware('auth:sanctum');
Route::post("/delete-warehouse", [WarehouseController::class, 'WarehouseDelete'])->middleware('auth:sanctum');

// Warehouse Api Route End





// Dashboard All API Route End

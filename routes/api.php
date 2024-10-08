<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuprilerController;

// Dashboard All API Route Start

// Brand Api Route Start
Route::get("/brand-list", [BrandController::class, 'BrandList'])->middleware('auth:sanctum');
Route::post("/create-brand", [BrandController::class, 'BrandCreate'])->middleware('auth:sanctum');
Route::post("/brand-by-id", [BrandController::class, 'BrandById'])->middleware('auth:sanctum');
Route::post("/update-brand", [BrandController::class, 'BrandUpdate'])->middleware('auth:sanctum');
Route::post("/delete-brand", [BrandController::class, 'BrandDelete'])->middleware('auth:sanctum');
// Brand Api Route End

// Category Api Route Start

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

// Supriler Api Route End





// Dashboard All API Route End

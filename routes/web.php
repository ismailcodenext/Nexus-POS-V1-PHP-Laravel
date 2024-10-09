<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// User Registration API Route Strat
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/nexus-login-page', [UserController::class, 'UserLogin']);
// User Registration API Route End



// Front-end View Route Api Start

Route::view('/', 'components.front-end.auth.registration-form');
Route::view('/nexus-login-page', 'components.front-end.auth.registration-form');



Route::get('/naxus-pos-logout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');

// Front-end View Route Api End


// Dashboard View Page Route Start

Route::view('/admin-dashboard-brand', 'pages.back-end-page.brand-page');
Route::view('/admin-dashboard-category', 'pages.back-end-page.category-page');
Route::view('/admin-dashboard-unit', 'pages.back-end-page.unit-page');
Route::view('/admin-dashboard-supriler', 'pages.back-end-page.suprlius-page');
Route::view('/admin-dashboard-product', 'pages.back-end-page.product-page');



Route::view('/admin-dashboard', 'components.back-end.dashboardsummery');
Route::view('/customer-page', 'pages.back-end-page.modal-page');

// Dashboard View Route End

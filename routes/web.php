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


// Front-end View Route Api End


// Dashboard View Route Start

Route::view('/admin-dashboard', 'components.back-end.dashboardsummery');
Route::view('/customer-page', 'pages.back-end-page.modal-page');

// Dashboard View Route End

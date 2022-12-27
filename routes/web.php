<?php

use App\Http\Controllers\Admin\ActivityLogsController;
use App\Http\Controllers\Admin\EmployeeContoller as AdminEmployeeContoller;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SimController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\Employee\SimController as EmployeeSimController;
use App\Http\Controllers\Employee\StoreController as EmployeeStoreController;
use App\Http\Controllers\EmployeeContoller;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);


Route::middleware("auth")->group(function(){

    Route::get("/",[HomeController::class, "dashboard"])->name("/");
    Route::get("/dashboard",[HomeController::class, "dashboard"])->name("dashboard");
});



Route::middleware(["auth","role:employee"])->prefix("employee")->name("employee.")->group(function (){

    Route::resource('stores', EmployeeStoreController::class);


    Route::resource('sims', EmployeeSimController::class);

});



Route::middleware(["auth","role:admin"])->prefix("admin")->name("admin.")->group(function (){

    Route::get("profile",[ProfileController::class, "index"])->name("profile");
    Route::put("profile",[ProfileController::class, "update"])->name("profile.update");
    Route::put("profile/password",[ProfileController::class, "updatePassword"])->name("profile.update-password");


    Route::resource('employees', AdminEmployeeContoller::class);

    Route::resource('stores', AdminStoreController::class);

    Route::resource("sims", SimController::class);

    Route::resource("logs",ActivityLogsController::class);

});

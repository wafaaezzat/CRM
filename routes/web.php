<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>['auth','isAdmin']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');


    //////////////////AdminInfo/////////////////
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
});
Route::group(['prefix'=>'employee', 'middleware'=>['auth','isEmployee']], function(){
    Route::get('dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
    Route::get('profile',[EmployeeController::class,'profile'])->name('employee.profile');
    Route::get('profile',[AdminController::class,'customers'])->name('admin.customers');


    //////////////////EmployeeInfo/////////////////
    Route::post('update-profile-info',[EmployeeController::class,'updateInfo'])->name('employeeUpdateInfo');
    Route::post('change-profile-picture',[EmployeeController::class,'updatePicture'])->name('employeePictureUpdate');
    Route::post('change-password',[EmployeeController::class,'changePassword'])->name('employeeChangePassword');
});
Route::group(['prefix'=>'customer', 'middleware'=>['auth','isCustomer']], function(){
    Route::get('dashboard',[CustomerController::class,'index'])->name('customer.dashboard');
    Route::get('profile',[CustomerController::class,'profile'])->name('customer.profile');


    //////////////////CustomerInfo/////////////////
    Route::post('update-profile-info',[CustomerController::class,'updateInfo'])->name('customerUpdateInfo');
    Route::post('change-profile-picture',[CustomerController::class,'updatePicture'])->name('customerPictureUpdate');
    Route::post('change-password',[CustomerController::class,'changePassword'])->name('customerChangePassword');
});

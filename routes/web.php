<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ActionUserController;

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

    Route::get('roles',[RoleController::class,'index'])->name('admin.roles');
    Route::get('create/role',[RoleController::class,'create'])->name('add.role');
    Route::post('new/role',[RoleController::class,'store'])->name('create.role');
    Route::get('edit/role/{id}',[RoleController::class,'edit'])->name('edit.role');
    Route::post('update/role/{id}',[RoleController::class,'update'])->name('update.role');
    Route::delete('delete/role/{id}',[RoleController::class,'destroy'])->name('delete.role');


    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('create/user',[UserController::class,'create'])->name('add.user');
    Route::post('new/user',[UserController::class,'store'])->name('create.user');
    Route::get('edit/user/{id}',[UserController::class,'edit'])->name('edit.user');
    Route::post('update/user/{id}',[UserController::class,'update'])->name('update.user');
    Route::delete('delete/user/{id}',[UserController::class,'destroy'])->name('delete.user');
    Route::get('assign/customer/{id}',[UserController::class,'assign'])->name('assign.customer');
    Route::post('update/customer/{id}',[UserController::class,'assign_update'])->name('assign.customerParent');
    Route::get('customers',[UserController::class,'customers'])->name('customers');


    //////////////////AdminInfo/////////////////
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
});




Route::group(['prefix'=>'employee', 'middleware'=>['auth','isEmployee']], function(){
    Route::get('dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
    Route::get('profile',[EmployeeController::class,'profile'])->name('employee.profile');


    Route::get('customers',[EmployeeController::class,'customers'])->name('employee.customers');
    Route::get('create/customers',[EmployeeController::class,'create_customer'])->name('employee.createCustomer');
    Route::post('store/customers',[EmployeeController::class,'store_customer'])->name('employee.storeCustomer');


    Route::get('add/action/{id}',[ActionUserController::class,'create'])->name('add.action');
    Route::post('store/action/{id}',[ActionUserController::class,'store'])->name('store.action');

    Route::get('action/result/{id}',[ActionUserController::class,'result'])->name('action.result');
    Route::post('add/result/{id}',[ActionUserController::class,'add_result'])->name('add.result');


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

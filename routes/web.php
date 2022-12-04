<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Permissioncontroller;
use App\Http\Controllers\Rolecontroller;
use App\Http\Controllers\Country;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RolePermissionController;
// use App\Models\Country;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('ahmed', function () {
//     return view('cms.parent');
// });

Route::prefix('cms/waseem/')->group(function(){

    // return view('cms.parent');
    Route::view('' , 'cms.parent' );
    Route::resource('accounts' , AccountController::class);
    Route::post('accounts_update/{id}' , [AccountController::class , 'update']);


    Route::resource('admins' , AdminController::class);
    Route::post('admins_update/{id}' , [AdminController::class , 'update'])->name('admins_update');

    Route::resource('roles' , Rolecontroller::class);
    Route::post('roles_update/{id}' , [Rolecontroller::class , 'update'])->name('roles_update');


    Route::resource('permissions', Permissioncontroller::class);
    Route::post('permissions_update/{id}' , [Permissioncontroller::class , 'update'])->name('permissions_update');

    Route::resource('roles.permissions', RolePermissionController::class);
    // Route::post('RolePermission/{id}' , [RolePermissioncontroller::class , 'update'])->name('RolePermission_update');
});



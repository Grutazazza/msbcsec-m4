<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'registerPost']);

Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('cabinet',[UserController::class,'cabinet'])->name('cabinet');

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'loginPost']);

Route::get('/post/{post}',[PostController::class,'firstPost'])->name('post');


Route::middleware('auth')->group(function (){
        Route::middleware('role:admin,user,moderator')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
                    Route::resource('/users', AdminController::class);
                    Route::resource('/roles', RolesController::class);
                });
            });
            Route::group(['prefix' => '/common', 'as' => 'common.'], function () {
                Route::resource('/post', PostController::class);
            });
        });
});

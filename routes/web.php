<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Auth\LoginController;




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

Route::resource('comments', CommentsController::class)->middleware('auth');
Route::resource('posts', PostsController::class)->middleware('auth');
Route::resource('users',UsersController::class)->middleware('auth');
Route::get('others',[PostsController::class,"users"])->middleware('auth')->name('others');
Route::resource('requests',RequestsController::class)->middleware('auth');
Route::post('accept',[RequestsController::class,"accept"])->middleware('auth')->name('accept');
Route::post('loggedout',[LoginController::class],"loggedout")->middleware('auth')->name('loggedout');
Route::get('friends',[UsersController::class,"friends"])->middleware('auth')->name('friends');
Auth::routes();
Route::patch('updatePost\{id}',[PostsController::class,"updatePost"])->middleware('auth')->name('updatePost');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

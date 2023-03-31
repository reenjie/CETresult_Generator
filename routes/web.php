<?php

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

Auth::routes();


Route::post('registerUser', [App\Http\Controllers\UserController::class, 'registerUser'])->name('registerUser');
Route::post('updatemyaccount', [App\Http\Controllers\UserController::class, 'updatemyaccount'])->name('updatemyaccount');
Route::get('updateentities','App\Http\Controllers\EditController@updateAllWritten')->name('updateentities');
Route::post('savepasser',[App\Http\Controllers\PasserController::class, 'savepasser'])->name('savePasser');
Route::post('importlist',[App\Http\Controllers\PasserController::class, 'importlist'])->name('importlist');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');
Route::post('saveuser', 'App\Http\Controllers\UserController@storeadmin')->name('saveuser');
Route::get('deleteitems', 'App\Http\Controllers\DeleteController@delete')->name('deleteItems');
Route::post('EditUsers', 'App\Http\Controllers\EditController@edit')->name('edit');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

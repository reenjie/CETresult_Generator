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

Route::post('saveclearanceRequest', [App\Http\Controllers\URequestController::class, 'saveclearanceRequest'])->name('saveclearanceRequest');
Route::post('saveidRequest', [App\Http\Controllers\URequestController::class, 'saveidRequest'])->name('saveidRequest');
Route::post('savecertificateRequest', [App\Http\Controllers\URequestController::class, 'savecertificateRequest'])->name('savecertificateRequest');
Route::get('changestatus', [App\Http\Controllers\URequestController::class, 'changestatus'])->name('changestatus');
Route::post('downloadfile', [App\Http\Controllers\URequestController::class, 'downloadfile'])->name('downloadfile');

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

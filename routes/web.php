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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
//----------------------------
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/document', [App\Http\Controllers\FormManagementController::class, 'index'])->name('document.index');
Route::put('/document/add', [App\Http\Controllers\FormManagementController::class, 'addDocu'])->name('document.add');
Route::get('/document/viewdoc/{id}', [App\Http\Controllers\FormManagementController::class, 'viewdoc'])->name('document.viewdoc');
Route::get('/document/viewdocajax/{id}', [App\Http\Controllers\FormManagementController::class, 'viewdocajax'])->name('document.viewdocajax');
Route::get('/show-pdf/{id}', [App\Http\Controllers\FormManagementController::class, 'show_pdf'])->name('show-pdf');
Route::put('/document/new_request', [App\Http\Controllers\FormManagementController::class, 'new_request'])->name('document.request');
//------
Route::get('/request', [App\Http\Controllers\RequestController::class, 'index'])->name('request.index'); 
Route::get('/request/view/{id}', [App\Http\Controllers\RequestController::class, 'viewdoc'])->name('request.view'); 
Route::get('request/show-pdf/{id}', [App\Http\Controllers\RequestController::class, 'show_pdf'])->name('request-show-pdf');
Route::get('request/approve/{id}', [App\Http\Controllers\RequestController::class, 'approve'])->name('request.approve');
Route::get('request/delete/{id}', [App\Http\Controllers\RequestController::class, 'delete'])->name('request.delete');
//----------------------------
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	Route::put('profile/upload', ['as' => 'profile.upload', 'uses' => 'App\Http\Controllers\ProfileController@upload']);
});

	

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

Route::get('/', "UploadController@index")->name('upload.index');
Route::post('/upload', "UploadController@storeUpload")->name('upload.store');
Route::get('/delete/{id}', "uploadController@delete")->name('upload.delete');

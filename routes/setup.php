<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Kurulum yönlendirmeleri
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('install', 'SetupController@index')->name('install');
Route::post('install', 'SetupController@install');
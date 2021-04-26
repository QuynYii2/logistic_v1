<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/take/list', '\App\Http\Controllers\TakeController@index')->name('take.list');
Route::get('/take/add', '\App\Http\Controllers\TakeController@add')->name('take.creat');
Route::post('/take/add', '\App\Http\Controllers\TakeController@save')->name('take.save');
Route::get('/take/{id}/edit', '\App\Http\Controllers\TakeController@edit')->name('take.edit');
Route::post('/take/update', '\App\Http\Controllers\TakeController@update')->name('take.update');
Route::get('/take/{id}/delete', '\App\Http\Controllers\TakeController@delete')->name('take.delete');

Route::get('/send/list', '\App\Http\Controllers\SendController@index')->name('send.list');
Route::get('/send/add', '\App\Http\Controllers\SendController@add')->name('send.creat');
Route::post('/send/add', '\App\Http\Controllers\SendController@save')->name('send.save');
Route::get('/send/{id}/edit', '\App\Http\Controllers\SendController@edit')->name('send.edit');
Route::post('/send/update', '\App\Http\Controllers\SendController@update')->name('send.update');
Route::get('/send/{id}/delete', '\App\Http\Controllers\SendController@delete')->name('send.delete');

Route::get('/user/list', '\App\Http\Controllers\UserController@index')->name('user.list');
Route::get('/user/add', '\App\Http\Controllers\UserController@add')->name('user.creat');
Route::post('/user/add', '\App\Http\Controllers\UserController@save')->name('user.save');
Route::get('/user/{id}/edit', '\App\Http\Controllers\UserController@edit')->name('user.edit');
Route::post('/user/update', '\App\Http\Controllers\UserController@update')->name('user.update');
Route::get('/user/{id}/delete', '\App\Http\Controllers\UserController@delete')->name('user.delete');
Route::get('ip_details', 'UserController@ip_details');

Route::get('/shipments/list', '\App\Http\Controllers\ShipmentController@index')->name('shipments.list');
Route::get('/shipments/{id}/detail', '\App\Http\Controllers\ShipmentController@detail')->name('shipments.detail');
Route::get('/shipments/add', '\App\Http\Controllers\ShipmentController@add')->name('shipments.creat')->middleware('permission');
Route::post('/shipments/add', '\App\Http\Controllers\ShipmentController@save')->name('shipments.save');
Route::get('/shipments/{id}/edit', '\App\Http\Controllers\ShipmentController@edit')->name('shipments.edit');
Route::post('/shipments/update', '\App\Http\Controllers\ShipmentController@update')->name('shipments.update');
Route::get('/shipments/{id}/delete', '\App\Http\Controllers\ShipmentController@delete')->name('shipments.delete');
Route::get('/shipments/multiple-add', '\App\Http\Controllers\MaatwebsiteDemoController@importExport')->name('multiple-add.creat')->middleware('permission');
Route::get('/shipments/multiple-add', '\App\Http\Controllers\MaatwebsiteDemoController@importExport')->name('multiple-add.creat')->middleware('permission');
Route::get('/shipments/search', '\App\Http\Controllers\ShipmentController@search')->name('shipments.search');
Route::post('/r_search', '\App\Http\Controllers\ShipmentController@rsearch')->name('r_search');


Route::get('importExport', 'MaatwebsiteDemoController@MaatwebsiteDemoController');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel')->name('import');

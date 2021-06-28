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
    return view('client');
});

Auth::routes();

Route::get('/client', function () {
    return view('client');
});
Route::get('/supplier', function () {

    return view('supplier');
});

Route::post('/store/supplier', 'InventoryController@store');
Route::post('/buy/product', 'InventoryController@show');
Route::post('/edit/product', 'InventoryController@edit');
Route::get('/inventory', 'InventoryController@getinventory');
Route::get('/return/inventory', 'InventoryController@ReturnInventory');
Route::get('/invoice/inventory', 'InventoryController@invoice');




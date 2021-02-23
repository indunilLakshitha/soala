<?php


Route::get('/', function () {
    return view('layouts.backend.app');
});

//---------------------------------------------------------------------------------customer routes
Route::get('/customers','CutomerController@index')->name('customer.index');
Route::get('/customers/create','CutomerController@create')->name('customer.create');
Route::get('/customers/edit/{id}','CutomerController@edit')->name('customer.edit');
Route::post('/customers/update','CutomerController@update')->name('customer.update');
Route::post('/customers/add','CutomerController@store')->name('customer.store');

//---------------------------------------------------------------------------------item routes
Route::get('/item','ItemController@index')->name('item.index');
Route::get('/item/create','ItemController@create')->name('item.create');
Route::get('/item/edit/{id}','ItemController@edit')->name('item.edit');  //open item update view
Route::post('/item/update','ItemController@update')->name('item.update'); //item update
Route::post('/item/add','ItemController@store')->name('item.store'); //item store
Route::post('/getitemprice','ItemController@getitemPrice');  //get item price using id






//---------------------------------------------------------------------------------order routes
Route::get('/orders','OrderController@index')->name('order.index');
Route::get('/orders/create','OrderController@create')->name('order.create');
Route::post('/orders/add','OrderController@store')->name('order.store');


//---------------------------------------------------Activity log routes
Route::get('add-to-log', 'LogActivityController@myTestAddToLog');//activity log testing
Route::get('/logActivity', 'LogActivityController@logActivity');


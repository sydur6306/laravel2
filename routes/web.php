<?php

use Illuminate\Support\Facades\Route;

   Route::group(['namespace'=>'App\Http\Controllers','prefix' => 'customer'],function(){
      Route::get('/','CustomerController@index')->name('customer.index');
      Route::get('/create','CustomerController@create')->name('customer.create');
      Route::post('/store','CustomerController@store')->name('customer.store');
       Route::get('/show/{id}','CustomerController@show')->name('customer.show');
       Route::get('/delete/{id}','CustomerController@delete')->name('customer.delete');
       Route::get('/edit/{id}','CustomerController@edit')->name('customer.edit');
       Route::post('/update/{id}','CustomerController@update')->name('customer.update');

   });


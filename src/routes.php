<?php

Route::group([
    'middleware'=>'web',
    'as'=>'admin.categories.',
    'prefix'=>'admin/categories',
    'namespace'=>'Leoalmar\CodeCategory\Controllers',
],function(){

    Route::get('/',['uses'=>'AdminCategoriesController@index','as'=>'index']);
    Route::get('create',['uses'=>'AdminCategoriesController@create','as'=>'create']);
    Route::post('store',['uses'=>'AdminCategoriesController@store','as'=>'store']);
    Route::get('/{id}/edit',['uses'=>'AdminCategoriesController@edit','as'=>'edit']);
    Route::put('/{id}',['uses'=>'AdminCategoriesController@update','as'=>'update']);
    Route::delete('/{id}',['uses'=>'AdminCategoriesController@destroy','as'=>'delete']);


});
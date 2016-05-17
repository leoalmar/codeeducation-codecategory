<?php

Route::group(['prefix'=>'admin/categories','namespace'=>'Leoalmar\CodeCategory\Controllers'],function(){

    Route::get('/','AdminCategoriesController@index');

});
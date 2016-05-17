<?php

Route::group(['prefix'=>'categories','namespace'=>'Leoalmar\CodeCategory\Controllers'],function(){

    Route::get('test','AdminCategoriesController@index');

});
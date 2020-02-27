<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('register', 'AuthController@register')->name('register');
Route::post('register', 'UserController@signup')->name('submit.reg.form');

Route::get('login', 'AuthController@login')->name('login');

Route::post('client/login', 'AuthController@clientValidate')->name('client.login');

Route::group(['middleware'=>'access'], function () {

    Route::prefix('dashboard')->group(function () {

        Route::group(['middleware'=>'uncheck'], function (){

            Route::get('home', 'BoardController@dashboard')->name('dashboard');
            Route::get('logout', 'AuthController@logout')->name('logout');
            Route::get('my-business', 'BusinessController@mybusiness')->name('mybusiness');
            Route::resource('business', 'BusinessController');

        });

        Route::get('setup/business', 'BusinessController@setup')->name('setup.business');

        Route::post('start/setup/business', 'BusinessController@stepone')->name('set.business1');

        Route::get('setup/business_2', 'BusinessController@setBusType')->name('setup.business2');

        Route::get('complete/setup/business/{bus}/{operation}', 'BusinessController@saveBusType')->name('set.business2');

    });
});

Route::get('seeds', 'OperationController@seed');
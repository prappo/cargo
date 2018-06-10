<?php

use App\Http\Controllers\CoreController;

Route::get('/', function () {
    return redirect('home');
});

Route::any('/hook', 'Hook@fb');

Route::post('/slack/hook', 'Hook@slack');
Route::any('/schedule/fire', 'ScheduleController@fire');

Route::group(['middleware' => 'web'], function () {
    Route::auth();


    Route::group(['middleware' => 'auth'], function () {

        // auth related routes will be here

        Route::get('/home','HomeController@index');
        Route::get('/invoice','InvoiceController@index');


        Route::get('/user/add','UserController@addUserIndex');
        Route::post('/user/add','UserController@createUser');
        Route::post('/user/update','UserController@updateInformation');
        Route::get('/user/{userId}/update','UserController@updateInformationIndex');
    });


});

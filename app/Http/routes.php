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
        Route::get('/user/list','UserController@userList');
        Route::post('/user/delete','UserController@deleteUser');

        // profile route

        Route::get('/profile','UserController@profile');
        Route::post('/profile/update','UserController@updateProfile');

        // Reporting

        Route::get('/report/agent/{id}','ReportController@showAgentReport');

        // order

        Route::get('/order','OrderController@index');

        // Balance

        Route::get('/balance/add','BalanceController@addBalanceIndex');
        Route::get('/balance/update','BalanceController@updateBalanceIndex');
        Route::post('/balance/update','BalanceController@updateBalance');
        Route::post('/balance/get/info','BalanceController@getInfo');
    });


});

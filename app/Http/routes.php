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

        Route::get('/home', 'HomeController@index');
        Route::get('/report/invoice', 'InvoiceController@index');


        Route::get('/user/add', 'UserController@addUserIndex');
        Route::post('/user/add', 'UserController@createUser');
        Route::post('/user/update', 'UserController@updateInformation');
        Route::get('/user/{userId}/update', 'UserController@updateInformationIndex');
        Route::get('/user/list', 'UserController@userList');
        Route::post('/user/delete', 'UserController@deleteUser');

        // profile route

        Route::get('/profile', 'UserController@profile');
        Route::post('/profile/update', 'UserController@updateProfile');

        // Reporting

        Route::get('/report/agent/{id}', 'ReportController@showAgentReport');
        Route::get('/report/agent', 'ReportController@agentList');
        Route::post('/report/agent', 'ReportController@showAgentReportByDate');
        Route::get('/report/outstanding', 'ReportController@outstanding');

        // order

        Route::get('/order', 'OrderController@index');
        Route::post('/order', 'OrderController@order');
        Route::post('/order/add/item', 'OrderController@addItem');
        Route::post('/order/delete/item', 'OrderController@deleteItem');

        Route::post('/order/getjs', 'OrderController@getJs');

        // Balance

        Route::get('/balance/add', 'BalanceController@addBalanceIndex');
        Route::get('/balance/update', 'BalanceController@updateBalanceIndex');
        Route::post('/balance/update', 'BalanceController@updateBalance');
        Route::post('/balance/get/info', 'BalanceController@getInfo');
        Route::get('/balance/request/make', 'BalanceController@balanceRequestIndex');
        Route::get('/balance/request', 'BalanceController@balanceRequestUserIndex');

        Route::get('/balance/requests', 'BalanceController@balanceRequestsList');

        Route::post('/balance/request/make', 'BalanceController@balanceRequest');
        Route::post('/balance/request/approve', 'BalanceController@approveBalanceRequest');
        Route::post('/balance/request/delete', 'BalanceController@deleteBalanceRequest');

        Route::get('/invoice/{id}', 'ReportController@invoice');
        Route::get('/invoice/print/{id}', 'ReportController@invoicePrint');

        Route::get('/customers', 'CustomerController@index');
        Route::post('/customer/get/info', 'CustomerController@getCustomerInfo');
        Route::post('/receivers/get', 'CustomerController@getReceivers');
        Route::post('/receiver/get/info', 'CustomerController@getReceiverInfo');


    });


});

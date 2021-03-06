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
        Route::get('/report/my', 'ReportController@showAgentReportMe');
        Route::get('/report/agent', 'ReportController@agentList');
        Route::post('/report/agent', 'ReportController@showAgentReportByDate');
        Route::get('/report/outstanding', 'ReportController@outstanding');

        // order

        Route::get('/order', 'OrderController@index');
        Route::post('/order', 'OrderController@order');
        Route::post('/order/add/item', 'OrderController@addItem');
        Route::post('/add/multiple/item', 'OrderController@addMultipleItem');
        Route::post('/order/delete/item', 'OrderController@deleteItem');

        Route::post('/order/getjs', 'OrderController@getJs');

        Route::post('/order/update/item', 'OrderController@updateItem');

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
        Route::post('/customer/search', 'CustomerController@search');

        // Bank

        Route::get('/bank/account/add', 'BankController@index');
        Route::post('/bank/account/add', 'BankController@addAccount');
        Route::get('/bank/accounts/list', 'BankController@accountsList');
        Route::post('/bank/account/delete', 'BankController@deleteAccount');
        Route::post('/bank/account/get', 'BankController@getAccounts');

        // chat

        Route::get('/chat','ChatController@index');
        Route::get('/chat/list','ChatController@userList');
        Route::get('/chat/{nodeId}/{to}','ChatController@getSingle');
        Route::post('/chat/insert','ChatController@insert');
        Route::post('/chat/get','ChatController@get');

        // test route
        Route::get('/prappo', 'Prappo@index');


    });


});

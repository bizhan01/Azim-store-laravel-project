<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Admin Panel Routes
Route::get('/salesReport', 'SellController@salesReport');
Route::get('/transactionDetails/{id}','SellOperationController@transactionDetails');
Route::resource('/expense', 'ExpenseController');
Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');
Route::get('/contacts', 'EmployeeController@contacts');
Route::resource('/revenue', 'RevenueController');
Route::resource('/orders', 'OrderController');
Route::get('/allOrders', 'OrderController@allOrders');
Route::resource('/balance', 'BalanceController');

// User Operation Routes
Route::get('/deleteUser/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/editUser/{id}','UserUpdateController@show');
Route::post('/editUser/{id}','UserUpdateController@edit');


// Product Registerar Routes
Route::resource('/product', 'ProductController');
Route::get('/addProduct', 'ProductController@create');

// Percentage Route
Route::resource('/percentage', 'PercentageController');

// Seller Panele Routes
Route::resource('/sales', 'SellController');
Route::get('/salesList', 'SellController@salesList');
Route::resource('/salesDetails', 'salesItemController');
Route::get('/addDiscount', 'SellController@addDiscount');
Route::get('/delete/{id}','SellController@destroy');
Route::get('/edit/{id}','SellOperationController@show');
Route::post('/edit/{id}','SellOperationController@edit');
Route::get('/print','SellOperationController@print');
Route::get('/printInvioce/{id}','SellOperationController@printInvioce');



Route::get('/allProducts', 'ProductController@allProducts');
Route::get('/soldProducts', 'ProductController@soldProducts');
Route::get('/notSoldProducts', 'ProductController@notSoldProducts');
Route::get('/exProducts', 'ProductController@exProducts');

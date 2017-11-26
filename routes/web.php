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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/example', '\App\Http\Controllers\Controller@example');

//Route to get all customers
Route::get('/customers', 'CustomersController@showCustomers');

//Route to get one customer by ID
Route::get('customers/{id}', 'CustomersController@showCustomersId');
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

//Route to get one customer by ID AND that company
Route::get('/customers/company/{id}', 'CustomersController@showCompanyId');

//Route to get one customer by ID
Route::get('customers/{id}', 'CustomersController@showCustomersId');

//Route to get one customer by ID AND that customers address
Route::get('/customers/{id}/address', 'CustomersController@showCustomerAddress');


//Route to get all customers
Route::get('/fb-login', 'FacebookController@index');

//Route to get all customers
Route::get('/login', 'FacebookController@loginForm');

//Route to get all customers
Route::get('/facebook', 'FacebookController@fbShow');

Route::resource('companies', 'CompanyController');

Route::resource('instagram', 'InstagramPictureController');

Route::get('/klarna', 'KlarnaController@index');

Route::get('/klarna-confirmation', 'KlarnaController@confirmation');

Route::get('/klarna-acknowledge', 'KlarnaController@acknowledge');

Route::resource('groups', 'GroupController');

Route::resource('products', 'ProductController');
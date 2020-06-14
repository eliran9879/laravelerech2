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

Auth::routes();

Route::resource('covenants_ibi', 'CovenantsibiController')->middleware('auth');
Route::get('covenants_ibi/destroy/{id}', 'CovenantsibiController@destroy');

Route::resource('covenants_hapoalim', 'CovenantshapoalimController')->middleware('auth');
Route::get('covenants_hapoalim/destroy/{id}', 'CovenantshapoalimController@destroy');

Route::resource('covenants_mizrahi', 'CovenantsmizrahiController')->middleware('auth');
Route::get('covenants_mizrahi/destroy/{id}', 'CovenantsmizrahiController@destroy');

Route::resource('client_data', 'ClientdataController')->middleware('auth');

// Route::post('/client_data/fetch1', 'ClientdataController@fetch1')->name('autocomplete1.fetch');

//Route::resource('customers', 'CustomerController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register_admin', 'RegistrationController@create');
Route::post('/home', 'RegistrationController@store');
//Route::resource('register_admin', 'RegistrationController');

Route::get('export', 'MyController@export')->name('export');
// Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');
Route::post('import2', 'MyController@import2')->name('import2');
Route::post('import1', 'MyController@import1')->name('import1');
Route::get('export1', 'MyController@export1')->name('export1');
Route::get('users/code/{id}', 'UserController@code')->name('code');

Route::resource('/users', 'UserController')->middleware('auth');

Route::get('/customers', 'CustomerController@index');
Route::get('/payees', 'PayeeController@index');
Route::get('/customers/action', 'CustomerController@action')->name('customers.action');
Route::get('/payees/action', 'PayeeController@action1')->name('payees.action');

Route::resource('payees', 'PayeeController');
Route::get('payees/destroy/{id}', 'PayeeController@destroy');

Route::resource('customers', 'CustomerController');
Route::get('customers/destroy/{id}', 'CustomerController@destroy');
Route::get('/clientdatas', 'ClientdataController@create');
Route::get('customers/{id}/show', 'CustomerController@show');

Route::post('clientdatas/fetch1', 'ClientdataController@fetch1')->name('ClientdataController.fetch1');

Route::get('/all', 'ClientdataController@all');
Route::get('client_data/status1/{id}', 'ClientdataController@status1')->name('status1');
Route::get('client_data/statusclose/{id}', 'ClientdataController@statusclose')->name('statusclose');
Route::post('/customers/fetch', 'CustomerController@fetch')->name('autocomplete.fetch');
Route::post('/payees/fetch', 'PayeeController@fetch1')->name('autocomplete.fetch1');
Route::post('/client_data/fetch', 'ClientdataController@fetch')->name('autocomplete.fetchpayee');
Route::post('/client_data/fetchwithdrawer', 'ClientdataController@fetchwithdrawer')->name('autocomplete.fetchwithdrawer');


Route::post('client_data/create', 'CustomerController@store1');
Route::post('client_data/create/add', 'PayeeController@store1');

// Route::get('searchajax', ['as'=>'searchajax','uses'=>'ClientdataController@searchResponse']);

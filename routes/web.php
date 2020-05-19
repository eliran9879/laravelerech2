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
Route::resource('covenants_hapoalim', 'CovenantshapoalimController')->middleware('auth');
Route::resource('covenants_mizrahi', 'CovenantsmizrahiController')->middleware('auth');
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
Route::get('/customers/action', 'CustomerController@action')->name('customers.action');
Route::resource('customers', 'CustomerController');
Route::get('customers/destroy/{id}', 'CustomerController@destroy');
Route::get('/clientdatas', 'ClientdataController@create');

Route::post('clientdatas/fetch1', 'ClientdataController@fetch1')->name('ClientdataController.fetch1');

Route::get('/all', 'ClientdataController@all');
Route::get('client_data/status1/{id}', 'ClientdataController@status1')->name('status1');
Route::get('client_data/statusclose/{id}', 'ClientdataController@statusclose')->name('statusclose');
Route::post('/customers/fetch', 'CustomerController@fetch')->name('autocomplete.fetch');
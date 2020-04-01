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
//Route::resource('customers', 'CustomerController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register_admin', 'RegistrationController@create');
Route::post('/home', 'RegistrationController@store');
//Route::resource('register_admin', 'RegistrationController');

Route::get('export', 'MyController@export')->name('export');
// Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');
Route::post('import1', 'MyController@import1')->name('import1');


Route::get('/customers', 'CustomerController@index');
Route::get('/customers/action', 'CustomerController@action')->name('customers.action');
Route::resource('customers', 'CustomerController');


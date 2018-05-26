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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('settings', 'SettingsController');
Route::post('/saveAccounts', 'SettingsController@saveAccounts');
Route::post('/desactivateAccount', 'SettingsController@desactivateAccount');
Route::name('pago')->get('/pago', 'PagoController@index');
Route::get('/banks/', 'SettingsController@getBanks');
Route::name('inicio')->get('/inicio', 'LoginController@index');
Route::name('vista')->get('/vista', 'SettingsController@vista');
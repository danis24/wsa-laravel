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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/targets', 'TargetController@index')->name('targets');
Route::get('/targets/vulnerabilities', 'VulnerabilitiesController@index')->name('vulnerabilities');
Route::post('/target/add', 'TargetController@add')->name('target/add');
Route::get('/target/verification/{id}', 'TargetController@verification')->name('target/verification');
Route::get('/target/verification/download/{id}', 'TargetController@downloadVerif')->name('target/verification/download');

Route::get('/settings', 'SettingController@index')->name('settings');
Route::get('/user_manual', 'UserManualController@index')->name('user_manual');
Route::get('/profile', 'UserController@profile')->name('profile');

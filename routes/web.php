<?php

use Illuminate\Support\Facades\Route;

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

Route::GET('admin/home', 'AdminController@index');

Route::GET('login', 'Admin/LoginController@showLoginForm')->name('admin.login');
Route::POST('login', 'Admin/LoginController@login');
Route::GET('admin-password/confirm', 'Admin/ConfirmPasswordController@showConfirmForm ')->name('admin.password.confirm');
Route::POST('admin-password/confirm', 'Admin/ConfirmPasswordController@confirm ');
Route::POST('admin-password/email', 'Admin/ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset', 'Admin/ForgotPasswordController@showLinkRequestForm')->name('admin.password.request ');
Route::POST('admin-password/reset', 'Admin/ResetPasswordController@reset')->name('password.update');
Route::GET('admin-password/reset/{token}', 'Admin/ResetPasswordController@showResetForm')->name('password.reset');

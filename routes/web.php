<?php

use App\Admin;
use Illuminate\Support\Facades\Route;
use Mailjet\LaravelMailjet\Facades\Mailjet;


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
Route::GET('admin/editor', 'EditorController@index');

Route::GET('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin', 'Admin\LoginController@login');
Route::GET('admin-password/confirm', 'Admin\ConfirmPasswordController@showConfirmForm ')->name('admin.password.confirm');
Route::POST('admin-password/confirm', 'Admin\ConfirmPasswordController@confirm ');
Route::POST('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::GET('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

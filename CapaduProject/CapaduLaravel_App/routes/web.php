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

//main pages

Route::get('/', 'PagesController@main')->name('main');
Route::get('/home', 'PagesController@home_page')->name('home_page');
Route::get('/profesor', 'HomeController@index')->name('profesor');
Route::get('/capapage', 'HomeController@capapage_page')->name('capapage');
Route::get('/upload', 'HomeController@upload_page')->name('uploadpage');

//post routes

Route::post('/action-upload', 'FileController@upload')->name('upload.upload');
Route::post('/action-delete/{name}', 'FileController@delete')->name('upload.delete');
Route::get('/action-download/{name}', 'FileController@download')->name('upload.download');

//dinamic pages controller

Route::get('pages/{id}', 'PagesController@dinamic_page')->name('profesor.page');

//Admin Authenthication

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login_admin');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout_admin');
});

//User Authenthication

Route::group(['middleware' => ['web']], function () {
  // Authentication Routes...
  $this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
  $this->post('/login', 'Auth\LoginController@login');
  $this->post('/logout', 'Auth\LoginController@logout')->name('logout');

  // Registration Routes...
  $this->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('/register', 'Auth\RegisterController@register');
  // Password Reset Routes...
  $this->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  $this->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  $this->get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  $this->post('/password/reset', 'Auth\ResetPasswordController@reset');
});
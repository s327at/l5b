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

    Route::prefix('blog')->group(function() {

    Route::get('/', 'ShowController@index');
    // Route::post('search', 'ShowController@naiti');
    Route::post('search', ['uses'=>'ShowController@naiti', 'as'=>'search']);

    Route::resource('show', 'ShowController');
    Route::any('showctatitag/{tag}', array('as' => 'show.ctatitag', 'uses' => 'ShowController@showctatitag'));

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('comments', 'CommentsController');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('user', 'UserController');
    });





    Route::group(['middleware' => ['auth', 'adm']], function () {
        Route::get('adminalluser', array('as' => 'admin.alluser', 'uses' => 'AdminController@alluser'));
        Route::any('adminban/{id}', array('as' => 'admin.ban', 'uses' => 'AdminController@banuser'));
        Route::any('userunban/{id}', array('as' => 'admin.unban', 'uses' => 'AdminController@unban'));
        Route::get('admincomment', array('as' => 'admin.comment', 'uses' => 'AdminController@showcomment'));
        Route::get('admin', 'AdminController@adminpanel');
        Route::any('adminmodcomment/{id}', array('as' => 'admin.modcomment', 'uses' => 'AdminController@moderate'));
        Route::get('adminctati', array(
            'as' => 'admin',
            'uses' => 'CtatiController@getctatiAdmin',
        ));
        Route::resource('ctati', 'CtatiController');

    });

   // Route::get('/home', 'PostResetPasswController@index');


});



Route::get('auth/login', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'auth/login'
    ]);
$this->post('auth/login', 'Auth\LoginController@login');
Route::post('auth/logout', ['uses'=>'Auth\LoginController@logout', 'as'=>'auth/logout']);

Route::get('register', [
    'uses' => 'Auth\RegisterController@showRegistrationForm',
    'as' => 'register'
]);
Route::post('register', 'Auth\RegisterController@register');

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


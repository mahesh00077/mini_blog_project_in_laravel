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
// Auth::routes();
#frontend part
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');
    Route::post('contact/action', 'HomeController@contact_action');
    Route::get('post/{slug}', 'PostController@index');
});

#backend part
Route::group(['namespace' => 'Admin'], function () {
    // Dashboard Route
    Route::get('admin/dashboard', 'HomeController@index')->name('admin/dashboard')->middleware('CheckSession');
    // Users Route
    Route::get('admin/users', 'UsersController@index');
    Route::get('admin/add_user', 'UsersController@create');
    Route::get('admin/add_user/{id}', 'UsersController@create');
    Route::post('admin/add_user/action', 'UsersController@user_action');
    Route::get('admin/user_del/{id}', 'UsersController@destroy');
    Route::get('admin/user_status/{id}/{status_value}', 'UsersController@change_status');
    // Post Route
    Route::get('admin/post', 'PostController@index');
    Route::get('admin/add_post', 'PostController@create');
    Route::get('admin/add_post/{id}', 'PostController@create');
    Route::post('admin/post_add/action', 'PostController@add_update');
    Route::get('admin/post/{id}', 'PostController@index');
    Route::get('admin/post_del/{post_id}/{cp_id}/{img_id}/{image_path}', 'PostController@destroy');
    // Tag Route
    Route::get('admin/tag', 'TagController@index');
    Route::get('admin/tag/{id}', 'TagController@index');
    Route::post('admin/tag/add_update', 'TagController@add_update');
    Route::get('admin/tag_del/{id}', 'TagController@destroy');
    // Category Route
    Route::get('admin/category', 'CategoryController@index');
    Route::get('admin/category/{id}', 'CategoryController@index');
    Route::post('admin/category/add_update', 'CategoryController@add_update');
    Route::get('admin/category_del/{id}', 'CategoryController@destroy');
    // admin login Route
    Route::get('admin-login', 'LoginController@index')->name('login');
    Route::post('admin/login-action', 'LoginController@loginAction');
    Route::get('admin-logout', 'LoginController@logoutUser')->name('admin-logout');
    // Email sending
    Route::get('admin/send/email', 'SendEmailController@index');
    Route::post('admin/send/email-action', 'SendEmailController@sendEmailAction');
    //Excel
    Route::get('admin/excel', 'ExcelController@index');
    Route::post('admin/excel/import', 'ExcelController@import');
    Route::get('admin/excel/exporting', 'ExcelController@export');
    // Route::get('admin/pdfview', array('as' => 'pdfview', 'uses' => 'PdfController@pdfview'));
    Route::get('admin/pdfview', array('as' => 'pdfview1', 'uses' => 'PdfController@pdfview'));
});
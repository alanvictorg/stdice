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
    return redirect()->route('login');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('dashboard.index');

    Route::resource('users', 'UsersController');
    Route::resource('teachers', 'TeachersController');
    Route::resource('courses', 'CoursesController');
    Route::resource('students', 'StudentsController');
    Route::resource('classes', 'ClassesController');
    Route::get('classes/register', 'ClassesController@register')->name('classes.register');

});
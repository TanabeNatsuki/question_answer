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
Route::get('/',function(){return view('welcome');});
Route::get('top','HelloController@top');
Route::get('ranking','HelloController@ranking');
Route::get('category','HelloController@category');
Route::get('user','HelloController@user');
Route::get('pass_change','HelloController@pass_change');
Route::post('formcheck','HelloController@formcheck');
Route::get('login','HelloController@login');
Route::get('question_all','HelloController@question_all');
Route::get('question_form','HelloController@question_form');
Route::get('question_content','HelloController@question_content');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('mail_send','HelloController@mail_send');
Route::post('register/pre_check','Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}','Auth\RegisterController@showForm');

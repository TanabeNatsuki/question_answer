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
Route::post('top','HelloController@top')->name('top');
Route::get('ranking','HelloController@ranking');
/*カテゴリ関連*/
Route::get('category','HelloController@category');
Route::get('category_add','HelloController@category_add');
Route::post('categoried','HelloController@categoried');
Route::get('category/all','HelloController@category_all');
/*ユーザー情報*/
Route::get('user','HelloController@user');
Route::post('search','HelloController@search');
Route::get('pass_change','HelloController@pass_change');
/*質問関連*/
Route::get('question_all','HelloController@question_all');
Route::get('question_form','HelloController@question_form');
Route::get('question_all/qa','HelloController@qa');
Route::post('question_all/qa','HelloController@qa_good');
/*回答機能*/
Route::post('answer_form','HelloController@answer_form');
Route::post('answer_complete','HelloController@answer_complete');
/*ログイン機能*/
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
/*会員登録機能*/
Route::post('register/pre_check','Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}','Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');
Route::get('question_complete','HelloController@question_complete');
Route::get('delete','HelloController@delete');
Route::post('deleted','HelloController@deleted');

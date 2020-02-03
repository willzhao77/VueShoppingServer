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

Route::get('api/slideshow', 'Api\SlideShowController@index');
Route::get('api/newslist', 'Api\NewsController@newsList');
Route::get('api/newsinfo/{id}', 'Api\NewsController@newsInfo');
Route::resource('api/newscomment', 'Api\NewsCommentController'); 


Route::resource('back/slideshow', 'Back\SlideShowController');
Route::resource('back/news', 'Back\NewsController');
Route::resource('back/newscomment', 'Back\NewsCommentController');

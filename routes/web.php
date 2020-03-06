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
//


Route::get('/', function () {
    return view('welcome');
});


Route::get('api/slideshow', 'Api\SlideShowController@index');
Route::get('api/newslist', 'Api\NewsController@newsList');
Route::get('api/newsinfo/{id}', 'Api\NewsController@newsInfo');
Route::get('api/sharecategory', 'Api\ShareCategoryController@index');
Route::resource('api/newscomment', 'Api\NewsCommentController');
Route::resource('api/sharecomment', 'Api\ShareCommentController');
Route::resource('api/shopitemcomment', 'Api\ShopItemCommentController');
Route::resource('api/userdetails', 'Api\UserDetailsController');
Route::resource('api/usercart', 'Api\UserCartController');
Route::get('api/sharelist/{id}', 'Api\ShareItemController@shareList');
Route::get('api/shareitem/{id}', 'Api\ShareItemController@show');
Route::get('api/shareitemimgs/{id}', 'Api\ShareItemController@showImages');
Route::get('api/shoplist', 'Api\ShopItemController@shopList');
Route::get('api/shopitem/{id}', 'Api\ShopItemController@show');
Route::get('api/shopitemimgs/{id}', 'Api\ShopItemController@showImages');
Route::get('api/shopitemdetails/{id}', 'Api\ShopItemController@showDetails');
Route::get('api/getshopcartlist/{ids}', 'Api\ShopItemController@getshopcartlist');
Route::get('api/searchlist/{keyword}', 'Api\ShopItemController@getSearchList');


Route::resource('back/slideshow', 'Back\SlideShowController');
Route::resource('back/news', 'Back\NewsController');
Route::resource('back/newscomment', 'Back\NewsCommentController');
Route::resource('back/sharecategory', 'Back\ShareCategoryController');
// Route::resource('back/shareitem', 'Back\ShareItemController');
Route::resource('back/shareitem', 'Back\ShareItemController');



Route::resource('back/sharecomment', 'Back\ShareCommentController');
Route::resource('back/shopitemcomment', 'Back\ShopItemCommentController');
Route::resource('back/shopitem', 'Back\ShopItemController');

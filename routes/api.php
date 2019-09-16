<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{search_term}', 'ArticleController@search');
Route::get('/article/{article_id}', 'ArticleController@show');
Route::put('/article/{article_id}/rating', 'ArticleController@rateArticle');

Route::group(['middleware'=>'auth:api'],function(){
Route::post('/article', 'ArticleController@store');
Route::put('/article/{article_id}', 'ArticleController@update');
Route::delete('article/{article_id}','ArticleController@destroy');
});


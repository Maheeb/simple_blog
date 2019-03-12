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

//Route::get('/', function () {
//    return view('layouts.sight');
//});

Route::get('/', [
    'uses' => 'SeoController@index',
    'as'   => 'seo'
]);

Route::post('/search', 'SeoController@search')->name('search');

Route::get('/seo/{post}', [
    'uses' => 'SeoController@show',
    'as'   => 'seo.show'
]);
Route::get('/tag/{tag}', [
    'uses' => 'SeoController@tag',
    'as'   => 'tag'
]);


Route::post('/seo/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as'   => 'blog.comments'
]);
//Route::get('/home','HmController@fnf');
Route::group(['middleware' => 'auth'], function() {
// lots of routes that require auth middleware
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/bd','BdController');
    Route::put('/bd/restore/{id}', [
        'uses' => 'BdController@restore',
        'as'   => 'backend.blog.restore'
    ]);
    Route::delete('/bd/force-destroy/{blog}', [
        'uses' => 'BdController@forceDestroy',
        'as'   => 'backend.blog.force-destroy'
    ]);
});

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



<?php

use Illuminate\Support\Facades\Route;

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

/*

Route::get('/amethyst', function () { 
    return '<h1>hey</h1>';
});

Route::get('/users/{id}', function ($id) { //contoh : amethyst.me/users/14432
    return 'This is user '.$id;
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'this is '.$name.' with id '.$id;
}); 


Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('pages.about');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


Route::resource('posts', 'PostsController'); 
//posts = name of the url
//if change to  'post' , then in the browser, the url must be 127.0.0.1/post
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

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

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@index')->name('blog');
    Route::get('/{post:slug}', 'BlogController@showPost')->name('blog.post.show');

    Route::get('/category/{postCategory:slug}', 'BlogController@showCategory')->name('blog.category.show');
});

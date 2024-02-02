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

use Creode\LaravelNovaBlog\Http\Controllers\BlogController;

Route::prefix(config('nova-blog.route_prefix', 'blog'))->group(function () {
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.post.show');
});

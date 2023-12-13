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

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/{post:slug}', [BlogController::class, 'showPost'])->name('blog.post.show');

    Route::get('/category/{postCategory:slug}', [BlogController::class, 'showCategory'])->name('blog.category.show');
});

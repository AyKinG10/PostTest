<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('posts.index');
});

Auth::routes();

Route::get('posts',[PostController::class, 'index'])->name('posts.index');
Route::get('posts/category/{category}', [PostController::class, 'postsByCat'])->name('posts.category');



Route::middleware(['auth'])->group(function (){
    Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function ()
    {
        Route::get('posts/create/',[PostController::class, 'create'])->name('posts.create');
        Route::post('posts',[PostController::class, 'store'])->name('posts.store');
        Route::put('posts/{post}',[PostController::class, 'update'])->name('posts.update');
        Route::get('posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
        Route::delete('posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
        Route::resource('images', ImageController::class)->only('create','store','destroy');
        Route::resource('categories', CategoryController::class)->only('create','store','update');
    });

    Route::prefix('adm')->as('adm.')->middleware('hasrole:moderator')->group(function ()
    {
        Route::put('posts/{post}',[PostController::class, 'update'])->name('posts.update');
        Route::get('posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
        Route::resource('images', ImageController::class)->only('update','edit');
        Route::resource('categories', CategoryController::class)->only('update','edit');

    });
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\postController;
use App\Http\Controllers\userController;

Route::get('/', function () {
    $posts = [];

    if (auth()->check()) {
        $posts = auth()->user()->getUsersOwnPost()->latest()->get();
    }

    return view('home', [
        'posts' => $posts
    ]);
});

Route::post('/register', [userController::class, 'register']);
Route::post('/login', [userController::class, 'login']);
Route::post('/logout', [userController::class, 'logout']);

// Post-related routes
Route::post('/create-post', [postController::class, 'createPost']);
Route::get('/edit-post/{post}', [postController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [postController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [postController::class, 'deletePost']);
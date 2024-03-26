<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


// Routes pour les utilisateurs
Route::apiResource('users', UserController::class);

// Routes pour les posts
Route::apiResource('products', ProductController::class);

// Routes pour les commentaires
Route::apiResource('comments', CommentController::class);

// Vous pouvez également ajouter des routes spécifiques pour des actions supplémentaires
// Par exemple, pour récupérer les posts d'un utilisateur spécifique
Route::get('users/{user}/posts', [UserController::class, 'userPosts']);


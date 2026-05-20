<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\PostController as v1PostController;
use App\Http\Controllers\Api\v2\PostController as v2PostController;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('v1')->group(function(){
        Route::apiResource('posts', v1PostController::class);
    });
}); 


Route::prefix('v2')->group(function(){
    Route::apiResource('posts', v2PostController::class);
});


// Route::get('/posts', [PostController::class, "index"]) -> name('posts.index');
// Route::post('/posts', [PostController::class, "store"]) -> name('posts.store');
// Route::get('/posts/{id}', [PostController::class, "show"]) -> name('posts.show');

require __DIR__.'/auth.php';
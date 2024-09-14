<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 🔽 追加
use App\Http\Controllers\Api\AuthController;
// 🔽 追加
use App\Http\Controllers\Api\TweetController;
// 🔽 追加
use App\Http\Controllers\Api\TweetLikeController;
// 🔽 1行追加
use App\Http\Controllers\Api\CommentController;

// 🔽 追加
Route::post('/register', [AuthController::class, 'register']);
// 🔽 追加
Route::post('/login', [AuthController::class, 'login']);
// 🔽 追加
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 🔽 追加
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tweets', TweetController::class);
    // 🔽 2 行追加
    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy']);
    // 🔽 1 行追加
    Route::apiResource('tweets.comments', CommentController::class);
});
  
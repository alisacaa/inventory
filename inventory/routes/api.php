<?php

use Illuminate\Support\Facades\Route;

// Menambahkan ->middleware('throttle:60,1') untuk membatasi 60 request per 1 menit (Soal 4)
Route::prefix('v1')->middleware('throttle:60,1')->group(function() {
    
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');

    // Items (Dipindahkan ke LUAR middleware auth agar bisa di-test langsung lewat Postman)
    Route::apiResource('items', 'App\Http\Controllers\ItemController');

    Route::middleware('auth:sanctum')->group(function(){
        // Categories
        Route::apiResource('categories', 'App\Http\Controllers\CategoryController')
            ->except(['destroy']);
        Route::delete('categories/{category}', 'App\Http\Controllers\CategoryController@destroy')
            ->middleware('role:admin');
    });
});
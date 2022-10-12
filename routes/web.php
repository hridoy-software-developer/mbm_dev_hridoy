<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', ['\App\Http\Controllers\AuthController','index']);
Route::post('login', ['\App\Http\Controllers\AuthController','login']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('dashboard', ['\App\Http\Controllers\DashboardController','index']);

	Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
		Route::get('', ['\App\Http\Controllers\PostController','index']);
		Route::get('list', ['\App\Http\Controllers\PostController','list']);
		Route::get('create', ['\App\Http\Controllers\PostController','create']);
		Route::post('store', ['\App\Http\Controllers\PostController','store']);
		Route::get('edit/{id}', ['\App\Http\Controllers\PostController','edit']);
		Route::post('update', ['\App\Http\Controllers\PostController','update']);
		Route::post('delete', ['\App\Http\Controllers\PostController','delete']);
		Route::get('download/{type}', ['\App\Http\Controllers\PostController','download']);
	});

	Route::get('logout', ['\App\Http\Controllers\AuthController','logout']);
});
<?php

use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// criando rota (uri, função)
Route::get('users', function () {
	return 'Hello World';
});

Route::post('users', function () {});
Route::delete('users', function () {});
Route::put('users', function () {});
Route::patch('users', function () {});
Route::options('users', function () {});

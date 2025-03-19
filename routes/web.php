<?php

use Illuminate\Support\Facades\Route;

// verbo http - get, post, put, patch, delete
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/usuarios', function () {
    // return 'Hello World';

    // json - laravel identifica e transforma array em json
    return [
        'id'=>1,
        'name'=>'John'
    ];
});
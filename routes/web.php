<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// verbo http - get, post, put, patch, delete
Route::get('/', function () {
    // $post = new \App\Models\Post();
    // $post->title = 'Meu primeiro post';
    // $post->body = 'Meu primeiro conteúdo de post';
    // $post->save();

    $post = \App\Models\Post::create([
        'title' => 'Meu segundo post',
        'body' => 'Meu segundo conteúdo de post'
    ]);

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

Route::get('/users', [UserController::class, 'getUsers']);

Route::get('admin/usuarios/{user}', [UserController::class, 'show']);
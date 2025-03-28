<?php

use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// verbo http - get, post, put, patch, delete
Route::get('/', function () {
    // criando registros com Eloquent
    // primeira forma:
    // $post = new \App\Models\Post();
    // $post->title = 'Meu primeiro post';
    // $post->body = 'Meu primeiro conteúdo de post';
    // $post->save();
    // segunda forma:
    // $post = \App\Models\Post::create([
    //     'title' => 'Meu segundo post',
    //     'body' => 'Meu segundo conteúdo de post'
    // ]);

    // buscando registros com Eloquent
    // buscando reistro por id:
    // $post = Post::find(1);
    // dd($post);
    // buscando registro com where:
    // alternativas com where, orWhere, whereNull, whereBetween, whereYear
    // $post = Post::where('title', 'Meu primeiro post')->first();
    // dd($post);
    // buscando coleção de registros
    // $post = Post::all();
    // dd($post);
    // alternativa de coleção com filtro
    // $post = Post::where('title', 'LIKE', '%post%')->get();
    // alternativa diretamente no model com filtro
    // $post = Post::where('title', 'LIKE', '%post%')->first();
    // dd($post);

    // atualizando registros com Eloquent
    // atualizando manualmente
    // $firstPost = Post::find(1);
    // $firstPost->title = 'Meu novo post';
    // $firstPost->body = 'Meu novo conteúdo';
    // $firstPost->save();
    // // dd($firstPost);
    // // forma alternativa com fill
    // $values = [
    //     'title' => 'My new post',
    //     'body' => 'My new contet'
    // ];

    // $secondPost = Post::where('id', '2')->first();
    // $secondPost->fill($values);
    // $secondPost->save();
    // dd($secondPost);

    // deletando registro com Eloquent
    // $selectedPost = Post::find(2);
    // $selectedPost->delete();
    // dd($selectedPost);

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
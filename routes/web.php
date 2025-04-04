<?php

use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
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

    // $user = User::find(1);
    // dd($user->profile);

    // $user = User::with('profile')->find(1);
    // dd($user);

    // $user = User::with('profile')->find(2);
    // $user->profile()->create([
    //     'type' => 'PJ',
    //     'document_number' => '909049499049'
    // ]);

    // // dd($user->profile->type);
    // dd($user->profile->document_number);

    // $user = User::with('posts', 'profile')->find(1);
    // $user->posts()->create([
    //     'title' => 'Meu terceiro post',
    //     'body' => 'Mais um conteúdo'
    // ]);
    // dd($user);

    // $roles = Role::all();
    // dd($roles);

    $user = User::with('roles')->find(2);
    // $user->roles()->attach(2);
    // $user->roles()->detach(2);
    $user->roles()->sync([1]);
    dd($user);

});

Route::get('admin/usuarios', function () {
    // return 'Hello World';

    // json - laravel identifica e transforma array em json
    return [
        'id'=>1,
        'name'=>'John'
    ];
})->name('users.index');

Route::get('/users', [UserController::class, 'getUsers'])->name('list.users');

Route::get('admin/usuarios/{user}', [UserController::class, 'show']);

Route::get('admin/usuario/cadastrar', [UserController::class, 'create'])->name('users.create');
Route::post('admin/usuario/cadastrar', [UserController::class, 'store'])->name('users.store');
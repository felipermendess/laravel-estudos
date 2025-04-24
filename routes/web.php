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
// Route::get('users', function () {
// 	return 'Hello World';
// });

Route::post('users', function () {});
Route::delete('users', function () {});
Route::put('users', function () {});
Route::patch('users', function () {});
Route::options('users', function () {});

// rotas com múltiplos verbos http
Route::match(['get', 'post'], 'users/methods', function () {
    return 'Múltiplos verbos http';
})->name('users');

// redirecionamento de rotas
// Route::redirect('route-one', 'route-two', 301);
// Route::permanentRedirect('route-one', 'route-two');

Route::get('route-one', function () {
    // lógica
    // sem nome da rota: return redirect('route-two');
    // com nome da rota
    return redirect()->route('routeTwo');
});

Route::get('route-two', function () {
    return 'Route two executing';
})->name('routeTwo');

// Renderizando view direto da rota e passando dados
Route::view('/welcome', 'welcome', [
    'greeting' => 'Hello World Laravel'
]);

// Rotas com parâmetros
Route::get('/users/{id}/{name}', function ($id = null, $name = null) {
    return 'Hello User ' . $id . ' - ' . $name;
});
// ? torna o parâmetro opcional
// valor padrão: inicializando parâmetro como null para evitar erro

// validações de rotas com exp. regular - números, letras, mescla, array
Route::get('/players/{player}', function ($player) {
    return $player;
})->where('player', '[0-9]+');

Route::get('/drivers/{driver}', function ($driver) {
    return $driver;
})->where('driver', '[A-Za-z]+');

Route::get('/thinkers/{thinker}/{id}', function ($thinker, $id) {
    return $thinker . ' - ' . $id;
})->where('thinker', '[A-Za-z]+')->where('id', '[0-9]+');

Route::get('/strikers/{striker}/{id}', function ($striker, $id) {
    return $striker . ' - ' . $id;
})->where([
    'striker' => '[A-Za-z]+',
    'id' => '[0-9]+'
]);

// validação de rotas com helpers - whereNumber, whereAlpha, whereAlphaNumeric
Route::get('/mousers/{mouser}', function ($mouser) {
    return $mouser;
})->whereNumber('mouser');

Route::get('/fakers/{faker}', function ($faker) {
    return $faker;
})->whereAlpha('faker');

Route::get('/courses/{course}', function ($course) {
    return $course;
})->whereAlphaNumeric('course');

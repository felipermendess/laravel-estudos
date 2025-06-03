<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Test2;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Http\Middleware\Test1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

// criando rota (uri, função)
// Route::get('users', function () {
// 	return 'Hello World';
// });

// Route::post('users', function () {});
// Route::delete('users', function () {});
// Route::put('users', function () {});
// Route::patch('users', function () {});
// Route::options('users', function () {});

// rotas com múltiplos verbos http
// Route::match(['get', 'post'], 'users/methods', function () {
//     return 'Múltiplos verbos http';
// })->name('users');

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
// Route::view('/welcome', 'welcome', [
//     'greeting' => 'Hello World Laravel'
// ]);

// Rotas com parâmetros
// Route::get('/users/{id}/{name}', function ($id = null, $name = null) {
//     return 'Hello User ' . $id . ' - ' . $name;
// });
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

Route::get('/ballers/{id}', function ($id) {
    return 'Baller ' . $id;
});

Route::get('/rules/{id}', function ($id) {
    return 'Rule Number ' . $id;
});

// validando parâmetro id globalmente
// app > providers > routeserviceprovider

// Route::pattern('id', '[0-9]+');
// Route::pattern('token', '[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}');

// agrupando rotas com prefixo
// Route::prefix('users')->name('admin.')->group(function () {
//     Route::get('', function () {
//         return 'Hello User';
//     })->name('users');

//     Route::get('{id}', function ($id) {
//         return 'Hello User ' . $id;
//     })->name('user');
// });

// agrupando rotas com middleware
// Route::middleware('signed')->group(function () {
//     Route::get('user', function () {
//         return 'Hello User';
//     })->name('user');

//     Route::get('user/{id}', function ($id) {
//         return 'Hello User ' . $id;
//     })->name('user.id');
// });

// middleware isoladamente
Route::get('test', function () {
    return 'Testing';
})->middleware('password.confirm');

// agrupando rotas com subdominio
Route::domain('{user}.felipesitepro.test')->group(function () {
    Route::get('', function ($user) {
        return 'Hello User ' . $user;
    });
    Route::get('{id}', function ($id) {
        return 'Hello User ' . $id;
    });
});

// fallback - "plano b" quando nenhuma rota corresponde à requisição feita
Route::fallback(function () {
    return view('welcome');
});

// Injeção de depedências
Route::get('dependencies', function (Request $request) {
    dd($request->query('animal'));  // Valor do parâmetro 'animal' na URL (?animal=gato)
    dd($request->query);            // Todos os parâmetros da query string
    dd($request->headers);          // Cabeçalhos HTTP da requisição
    dd($request->method());         // Método HTTP (GET, POST, etc.)
    dd($request);                   // Objeto Request completo
});

// Injeção de Model na Rota
Route::get('user/{user}', function (User $user) {
    dd($user);
});

Route::get('/lovers', function() {
    return ['lovers'];
})->middleware(Test1::class);

Route::get('/glasses', function() {
    return ['glasses'];
})->middleware([Test1::class, Test2::class]);

// test1::class e test2::class = test
Route::middleware(['test'])->group(function() {
    Route::get('/branches', function() {
        return 'Hello branch';
    });
    Route::get('/trees', function() {
        return 'Hello tree';
    });

    Route::withoutMiddleware(['test1'])->group(function() {
        Route::get('/blog', function() {
            return 'Blog.com';
        });
        Route::get('/contact', function() {
            return 'Contact with me';
        });
    });
});
// 'test1' = Test1::class, 'test2' = Test2::class

// Route::get('/show', [UserController::class, 'show']);
Route::get('/print/{id}', [UserController::class, 'printUserId']);

// controller de ação única = invokable
Route::get('/checkout', CheckoutController::class);

// Route::resource('/allUsers', UserController::class);

// setando métodos para controller = only('method')
// Route::resource('/allUsers', UserController::class)->only(['index, destroy']);

// setando métodos que não devem conter no controller = execept('method');
// Route::resource('/allUsers', UserController::class)->except(['edit', 'update']);

// criando múltiplos resources
Route::resources([
    '/allUsers' => UserController::class,
    '/allPosts' => UserController::class
]);

// criando resource para API - remove métodos que precisam de views (create, edit)
Route::apiResource('/allProfiles', UserController::class);
// sintaxe para várias apiResources
// Route::apiResources([

// ]);

// formas de aninhar rotas
// users/{user}/comments -> puxa todos os comentários do usuário
// users/{user}/comments/comment -> puxa um comentário específico do usuário
// Route::resource('/users/{user}/comments', UserController::class);
// facilitando a escrita de rotas aninhadas com .
// Route::resource('users.comments', UserController::class);
// separando rotas aninhadas com prefixo shallow, ou seja, não precisa passar o id do usuário para criar um comentário
// Route::resource('users.comments', UserController::class)->shallow();

// definindo nome para parâmetros gerados pela resource
Route::resource('/posts', PostController::class)->parameters([
    'posts' => 'postId'
]);

// definindo tipo de parâmetro como email (campo do db) e tirando o padrão de id com os dois pontos
// Route::get('showUsers/{user:email}', [UserController::class, 'show']);
// fazemos o mesmo com resource
// Route::resource('/users', UserController::class)->scoped([
//     'user' => 'email'
// ]);

// adicionando rota comum a um resource
Route::get('users/posts', [UserController::class, 'posts'])->name('users.posts');

// acessando dados da url
// Route::get('user', function (Request $request) {
    // dd($request);
    // dd($request->path());
    // dd($request->url());
    // dd($request->fullUrl());
    // dd($request->fullUrlWithQuery(['curso' => 'laravel']));
    // dd($request->fullUrlIs('www.google.com'));
    // dd($request->is('user'));
    // dd($request->routeIs('user'));
    // dd($request->method());
    // dd($request->isMethod('post'));
// });

// acessando dados do input
// Route::get('user', function (Request $request) {
//     dd($request);
//     dd($request->input());
//     dd($request->input('token'));
//     dd($request->input('course', 'course not defined'));
//     dd($request->input('course', 'course not defined'));
//     dd($request->input('course.laravel'));
//     dd($request->query());
//     dd($request->query('token'));
//     dd($request->query('product', 'laragon'));
//     dd($request->token);
//     dd($request->only('course'));
//     dd($request->except('course'));
// });

// checagem dos inputs
// Route::get('user', function (Request $request) {
// 	has - verifica se tem
//     if ($request->has('token')) {
// 	    dd('token existe');
//     }

//     has com mais de um input
//     if ($request->has(['token', 'course'])) {
// 	    dd('token e course existem');
//     }

//     whenHas - quando tiver
//     $request->whenHas('token', function ($input) {
// 	    dd('faça alguma coisa quando tiver token');
//     });

//     hasAny - se pelo menos uma existir
//     if ($request->hasAny(['token', 'product'])) {
// 	    dd('faça algo se um deles existir');
//     }

//     filled - verifica se o campo está preenchido
//     if ($request->filled('curso')) {
// 	    dd('faça algo');
//     }

//     whenFilled - faz algo quando estiver preenchido
//     $request->whenFilled('curso', function ($input) {
// 	    dd('faça alguma coisa quando curso tiver preenchido');
//     });

//     missing - verifica se está fora da request
//     if ($request->missing('cursos')) {
// 	    dd('Cursos está faltando');
//     }
// });

// views
Route::get('/', function () {
    return view('welcome');

    // return View::make('welcome');

    // return view('users.index');

    // return View::first(['users.profile_view', 'users.profile']);

    // dd(View::exists('users.posts'));
});

// view e controller
Route::get('profile', [UserController::class, 'index']);

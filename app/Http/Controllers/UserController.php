<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers () {
        // buscando todos os usuários do banco
        $users = User::all();

        // retornando view para a função que é executada na rota e setando variáveis para o blade template
        return view('users.index', [
            'greeting' => 'Hello Peoples',
            'users' => $users
            // 'users' => [
            //     'id' => 1,
            //     'name' => 'Reece'
            // ]
        ]);
        
        // return 'Hello Users';
        // return [
        //     'id'=>1,
        //     'name'=>'Smith'
        // ];
    }

    public function show (User $user) {
        return view('users.show', [
            'user' => $user
        ]);
        // return $user;
    }

    public function create () {
        return view('users.create');
    }

    public function store (Request $request) {
        // dd($request);
        // trás todos os campos do form
        // dd($request->all());
        
        // validando formulários 
        $inputs = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'photo' => 'file'
        ]);

        // validando se o arquivo é valido e não vazio
        if (!empty($inputs['photo']) && $inputs['photo']->isValid()) {
            // salvando arquivo no storage > app > private
            $inputs['photo']->store();

            // caso queira guardar o arquivo na pasta public basta mudar no arquivo .env:
		    // FILESYSTEM_DISK = public
		 
        }

        dd($inputs);
        // User::create($inputs);

        return redirect()->back();
    }
}
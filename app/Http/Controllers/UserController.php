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
}
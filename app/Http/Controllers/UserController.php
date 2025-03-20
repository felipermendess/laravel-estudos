<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers () {
        // return 'Hello Users';
        return [
            'id'=>1,
            'name'=>'Smith'
        ];
    }

    public function show (User $user) {
        return $user;
    }
}
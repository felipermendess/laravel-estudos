<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request, User $user)
    {
        dd('vars', $request, $request->headers, $request->method(), $request->query(), $user->pluck('name'));
    }

    public function printUserId($id)
    {
        dd($id);
    }
}

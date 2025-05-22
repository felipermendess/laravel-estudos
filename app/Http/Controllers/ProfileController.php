<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index ()
    {
        $users = User::all();

        return view('profile.index', compact('users'));

        // return view('profile.index', [
        //     'profiles' => $users,
        // ]);

        // return view('profile.index', [
        //     'title' => 'Title of the Page',
        // ]);

        // return view('profile.index')->with([
        //     'profile' => 'Jonathan Gilbert'
        // ]);
    }
}

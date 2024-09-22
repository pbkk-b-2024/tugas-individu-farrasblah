<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author()
    {
        // dd(Auth::check());
        $user = Auth::user();
        // dd($user);
        $isAuthor = $user && $user->role === 'author';

        return view('author-post', ['author' => $isAuthor]);
    }

}

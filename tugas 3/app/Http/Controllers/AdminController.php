<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view('components.layout');
    }
    function registered_user(){
        return view('components.layout');
    }
    function author(){
        
        $author = Auth::user()->role === 'author'; 
        $posts = Post::all(); 
        return view('author-post', compact('posts'));
   
    }
}

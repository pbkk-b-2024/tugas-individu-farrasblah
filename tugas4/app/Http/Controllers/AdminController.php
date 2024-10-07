<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        
        if (!$user) {
            return view('components.layout'); // Kembalikan tampilan default jika tidak ada pengguna yang login
        }

        if ($user->role === 'author') {
            // Jika peran adalah author, redirect ke halaman author
            return redirect('/author');
        } elseif ($user->role === 'registered_user') {
            // Jika peran adalah registered_user, redirect ke halaman registered user
            return redirect('/registered_user');
        } 
        return view('components.layout');
    }
    
    function registered_user(){
        // Memeriksa apakah pengguna memiliki peran registered_user
        if (Auth::user()->role !== 'registered_user') {
            // Jika pengguna bukan registered_user, arahkan mereka ke halaman lain atau berikan pesan error
            return redirect('/')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }

        // Jika pengguna adalah registered_user, tampilkan halaman yang diinginkan
        return view('components.layout');
    }
    function author(){
        
        $author = Auth::user()->role === 'author'; 
        $posts = Post::all(); 
        return view('author-post', compact('posts'));
   
    }
}

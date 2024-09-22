<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{    
    public function index()
    {
        $posts = Post::with('categories')->paginate(6);
        $author = Auth::user()->role === 'author';
        //$paginatedPosts = Post::with('categories')->paginate(6);
        return view('blog', compact('posts', 'author'));
    }

    public function create()
    {
        $categories = Category::all();
        $author = Auth::user()->role === 'author'; // Pastikan peran author
        return view('create-post', compact('categories', 'author'));
    }

    public function store(Request $request)
    {
        $author = Auth::user()->role === 'author';
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string', // Pastikan untuk mengganti 'content' menjadi 'body'
            'categories' => 'required|array', // Pastikan kategori dipilih
            'categories.*' => 'exists:categories,id', // Validasi kategori ada di tabel
        ]);
        
        // Debugging: Log data yang diterima
        Log::info('Data yang diterima:', $request->all());

        // Simpan post baru
        $post = Post::create([
            'title' => $request->title,
            'author' => Auth::user()->name,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
        ]);
        
        // dd($post);

        // Attach kategori yang dipilih ke post
        $post->categories()->attach($request->categories);

        return redirect()->route('author.blog.store')->with('success', 'Blog post created successfully!');
    }

}

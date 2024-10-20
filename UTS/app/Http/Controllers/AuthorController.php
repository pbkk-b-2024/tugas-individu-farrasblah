<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function listUser(Request $request)
    {
        $query = $request->input('search');
        
        if ($query) {
            // Mengambil pengguna yang sesuai dengan pencarian dan paginate
            $users = User::where('name', 'LIKE', "%{$query}%")->paginate(5);
        } else {
            // Mengambil semua pengguna jika tidak ada pencarian dan paginate
            $users = User::paginate(5);
        }

        $author = Auth::user()->role === 'author';
        return view('list-user', compact('users', 'author'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id); // Mengambil pengguna berdasarkan ID
        $author = Auth::user()->role === 'author';
        return view('edit-user', compact('user', 'author')); // Mengembalikan view dengan data pengguna
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('author.listuser')->with('success', 'Pengguna berhasil diperbarui!');
    }


    public function deleteUser($id)
    {
        // Mencari pengguna berdasarkan ID
        $user = User::find($id);

        // Jika pengguna ditemukan, hapus
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
        }

        // Jika pengguna tidak ditemukan
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }
}

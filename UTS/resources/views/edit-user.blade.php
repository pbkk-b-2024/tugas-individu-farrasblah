@extends('components.layout')

@section('content')
<div class="container mt-20">
    <h1>Edit Pengguna</h1>
    <form action="{{ route('author.updateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select id="role" name="role" class="mt-1 block w-full rounded-lg p-2">
                <option value="guest" class="ml-4" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                <option value="author" class="ml-4" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                <option value="registered-user" class="ml-4" {{ $user->role == 'registered-user' ? 'selected' : '' }}>Registered User</option>
            </select>
        </div>
        <button type="submit" style="background-color: rgb(30, 144, 255); color: white; padding: 10px 20px; border-radius: 8px; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgb(100, 149, 237)'" onmouseout="this.style.backgroundColor='rgb(30, 144, 255)'">Update</button>
    </form>
</div>
@endsection

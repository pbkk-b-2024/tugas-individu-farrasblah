<!-- resources/views/blog/show.blade.php -->

@extends('components.layout')

@section('content')
    <div class="container mx-auto px-5 mt-20">
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                
                <div class="text-sm text-gray-500 mb-2">
                    <span>Author: {{ $post->author }}</span>
                </div>

                {{-- Menampilkan kategori terkait --}}
                <div class="mb-3">
                    @foreach($post->categories as $category)
                        <span class="inline-block bg-gray-200 rounded-full px-2 py-1 text-xs font-semibold text-gray-700 mr-1 mb-1">{{ $category->name }}</span>
                    @endforeach
                </div>

                <p class="text-gray-700 text-sm mb-4">{{ $post->body }}</p>
            </div>
        </article>
        
        {{-- Link kembali ke daftar post --}}
        <div class="mt-6">
            <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">Kembali ke daftar post</a>
        </div>
    </div>
@endsection

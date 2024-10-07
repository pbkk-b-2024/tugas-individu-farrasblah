@extends('components.layout')

@section('content')
    {{-- Tampilkan post untuk semua pengguna --}}
    @if($posts->isNotEmpty())
        <div class="container mx-auto px-5 mt-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="mb-2 text-xl font-bold text-gray-900 truncate">{{ $post->title }}</h2>
                            <div class="text-sm text-gray-500 mb-2">
                                <a href="#" class="hover:underline">{{ $post->author }}</a>
                            </div>
                            
                            {{-- Menampilkan kategori terkait --}}
                            <div class="mb-3">
                                @foreach($post->categories as $category)
                                    <span class="inline-block bg-gray-200 rounded-full px-2 py-1 text-xs font-semibold text-gray-700 mr-1 mb-1">{{ $category->name }}</span>
                                @endforeach
                            </div>

                            <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $post->body }}</p>
                            <a href="" class="text-sm font-medium text-blue-500 hover:underline">Read more </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @else
        <p class="mt-20 text-center text-gray-700">Belum ada post yang tersedia.</p>
    @endif

    <div class="mt-8 flex items-center justify-center space-x-4">
        {{ $posts->links('pagination::tailwind') }}
    </div>

    {{-- Pesan untuk guest jika konten tambahan perlu login --}}
    @guest
        <p class="mt-20 text-center text-gray-700">Silakan login untuk mendapatkan akses penuh ke konten.</p>
    @endguest

@endsection
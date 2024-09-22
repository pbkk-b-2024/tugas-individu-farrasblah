@extends('components.layout')

@section('content')
    <form action="{{ route('author.blog.store') }}" method="POST" class=" px-8 pt-6 pb-8 mb-4 mx-auto bg-white shadow-md flex-grow rounded mt-20">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" id="content" name="body" required></textarea>
        </div>

        <div class="mb-4">
            <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
            <select multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="categories" name="categories[]" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="text-gray-600 text-xs mt-1">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple categories.</p>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline !bg-blue-500 !text-white">
                Submit
            </button>
        </div>    
    </form>
@endsection

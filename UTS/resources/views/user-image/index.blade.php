@extends('components.layout')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg mt-20 p-6">
    <div class="mb-6 border-b pb-4">
        <h4 class="text-xl font-semibold text-gray-800 inline-block">
            Upload Product Images
        </h4>
        <a href="{{ route('author.listuser') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg float-right hover:bg-blue-600 transition duration-300">
            Back
        </a>
    </div>
    <div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <h5 class="text-lg font-medium text-gray-700 mb-4">Product Name: 
            <span class="font-bold text-gray-900">{{ $user->name }}</span>
        </h5>

        @if ($errors->any())
            <ul class="bg-red-100 text-red-700 p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('author.images', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-gray-600 transition duration-300 inline-block">
                    Choose File
                    <input type="file" name="images[]" multiple class="hidden" id="fileInput" onchange="displayFileName()">
                </label>
                <span id="fileName" class="text-gray-500 ml-2">No file chosen</span>
            </div>
            <div class="text-right">
                <button  type="submit" class="text-white font-semibold px-6 py-2 rounded-lg shadow hover:opacity-90 transition duration-300"
                style="background-color: rgb(0, 123, 255);">
                    Upload
                </button>
            </div>
        </form>
    </div>
    
    <div class="flex flex-wrap mt-4"> <!-- Menggunakan Flexbox untuk tata letak gambar -->
        @foreach ($userImages as $userImg)
            <div class="relative border p-2 m-3">
                <img src="{{ asset($userImg->image) }}" class="border" style="width: 100px; height: 100px;" alt="img">
                <form action="{{ route('author.destroyImage', ['id' => $userImg->id]) }}" method="POST" class="mt-2 text-center">
                    @csrf
                    @method('DELETE') <!-- Menggunakan metode DELETE untuk penghapusan -->
                    <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
                        Delete/Remove
                    </button>
                </form>
            </div>
        @endforeach
    </div>    

</div>

<script>
    function displayFileName() {
        const input = document.getElementById('fileInput');
        const fileNameDisplay = document.getElementById('fileName');
        
        const files = input.files;
        if (files.length > 0) {
            fileNameDisplay.textContent = Array.from(files).map(file => file.name).join(', ');
        } else {
            fileNameDisplay.textContent = 'No file chosen';
        }
    }
</script>
@endsection

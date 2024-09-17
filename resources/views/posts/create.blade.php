@extends('layouts.base')

@section('content')
    <h1 class="text-4xl font-bold mb-6 text-center mt-6">Create a New Post</h1>

    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <!-- Form to create a new post -->
        <form action="/posts" method="POST">
            @csrf <!-- CSRF token for security -->
            <!-- Title Input -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-lg shadow-sm" placeholder="Enter the post title" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>



            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Submit Post
                </button>
            </div>
        </form>
    </div>
@endsection

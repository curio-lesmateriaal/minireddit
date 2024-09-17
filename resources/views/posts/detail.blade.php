@extends('layouts.base')

@section('content')
    <h1 class="text-4xl font-bold mb-6 text-center mt-6">{{ $post->title }}</h1>

    <!-- Post Details -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Upvotes:
            <span id="post-upvotes" class="font-bold">{{ $post->upvotes }}</span>
        </h2>

        <!-- Upvote and Downvote Buttons for Post -->
        <div class="flex items-center mb-4">
            <button onclick="upvotePost({{ $post->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                Upvote Post
            </button>
            <button onclick="downvotePost({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Downvote Post
            </button>
        </div>

        <!-- Comments Section -->
        <h3 class="text-xl font-medium mb-6">Comments</h3>
        @forelse($post->comments as $comment)
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <p class="text-gray-800 mb-2">
                    <span class="font-bold">{{ $comment->user }}</span> said:
                    {{ $comment->comment }}
                </p>
                <p class="text-gray-600">Upvotes: <span id="comment-upvotes-{{ $comment->id }}" class="font-bold">{{ $comment->upvotes }}</span></p>

                <!-- Upvote and Downvote Buttons for Comments -->
                <div class="flex items-center">
                    <button  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Upvote Comment
                    </button>
                    <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Downvote Comment
                    </button>
                </div>
            </div>
        @empty
            <p>No comments yet. Be the first to comment!</p>
        @endforelse
    </div>
@endsection

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

        <!-- Edit Button -->
        <div class="mb-4">
            <a href="{{$post->id}}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Post
            </a>
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
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Upvote Comment
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Downvote Comment
                    </button>
                </div>
            </div>
        @empty
            <p>No comments yet. Be the first to comment!</p>
        @endforelse
        @auth
        <div class="max-w-xl my-4 p-4 bg-white rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Post a Comment</h3>

            <form action="{{ route('createComment', $post->id) }} " method="POST">
                @csrf
              <!-- Message Input -->
              <div class="mb-4">
                <textarea
                  name="comment"
                  id="comment"
                  rows="4"
                  placeholder="Write your comment..."
                  class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required></textarea>
              </div>

              <!-- Submit Button -->
              <div class="text-right">
                <button
                  type="submit"
                  class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Submit
                </button>
              </div>
            </form>
        </div>
        @else
            <a href="{{route('login')}}" class="text-blue-500 p-2">Log in om een comment te plaatsen!</a>
        @endauth


    </div>
@endsection

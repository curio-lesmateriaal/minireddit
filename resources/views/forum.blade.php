@extends('layouts.base')
@section('content')
    <h1 class="text-4xl font-bold mb-6 text-center mt-6">Mini Reddit Forum</h1>
    <a href="posts/create" class="rounded p-4 inline-block bg-indigo-500 text-white font-bold">Nieuwe post aanmaken</a>
    <h2 class="text-3xl font-bold mb-6">Posts
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-500 text-white">
            {{ count($redditPosts) }}
        </span>
    </h2>

    @foreach($redditPosts as $post)
        <div class="bg-white shadow-lg border border-black rounded-lg p-6 mb-8">
            {{-- <p class="text-italic">door: {{$post->user->name}}</p> --}}
            <h3 class="text-2xl font-semibold mb-4"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
            <p class="text-gray-600 mb-4">Aantal upvotes:
                <span id="upvotes-count-{{ $post->id }}" class="font-bold">{{ $post->upvotes }}</span>
            </p>

            <!-- Upvote and Downvote Buttons -->
            <div class="flex items-center mb-4">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Upvote
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Downvote
                </button>
            </div>

            <p class="text-xl font-medium mb-4">Comments:
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-500 text-white">
                    {{ count($post->comments) }}
                </span>
            </p>
        </div>
    @endforeach
@endsection

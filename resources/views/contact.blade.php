@extends('layouts.base')
@section('content')
    <h1>Contact</h1>
    {{-- make a contact form --}}
    <form action='saveContactData' method="POST">
        @csrf
        <input required type="text" name="name" placeholder="Your name">
        <input type="email" name="email" placeholder="Your email">
        <textarea name="message" placeholder="Your message"></textarea>
        <button type="submit">Send</button>
    </form>
@endsection

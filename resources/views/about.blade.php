@extends('layouts.public')

@section('root.title')
    Thitiny URL | About
@endsection

@section('public.content')
    <div class="container">
        <h1>About Thitiny URL</h1>
        <p>Thitiny URL is a simple URL shortening service that allows you to create short links for your long URLs.</p>
        <p>It is designed to be easy to use and efficient, providing a quick way to share links without the hassle of long
            URLs.</p>
        <p>For more information, please visit our <a href="{{ route('home') }}">home page</a>.</p>
    </div>
@endsection

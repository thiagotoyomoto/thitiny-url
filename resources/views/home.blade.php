@extends('layouts.public')

@section('root.title')
    Thitiny URL | Home
@endsection

@section('public.content')
    <div class="container">
        <form action="{{ route('shorten') }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="url">Enter URL:</label>
                <input type="text" name="long_url" id="url" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Encurtar</button>
        </form>

        @if ($errors->any())
            {{ $errors }}
        @endif

        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection

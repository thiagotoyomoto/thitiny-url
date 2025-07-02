@extends('layouts.public')

@section('root.title')
    Thitiny URL | Home
@endsection

@section('public.header')
    <header class="fixed w-full flex flex-row justify-between px-8 py-3 text-white bg-indigo-500">
        <a class="flex flex-row items-center gap-2 cursor-pointer" href="{{ route('home') }}">
            <x-fas-link class="w-8 h-8" />
            <h1 class="text-xl font-bold">Thitiny URL</h1>
        </a>

        <div class="flex flex-row gap-12">
            <nav>
                <ul>
                    <li><a href="https://github.com/thiagotoyomoto/thitiny-url"><x-fab-github class="w-8 h-8" /></a></li>
                </ul>
            </nav>
        </div>
    </header>
@endsection

@section('public.content')
    <main class="flex-1 mt-14">
        <section class="mx-auto max-w-10/12 pb-72 border-b">
            <div class="mt-48 mb-24">
                <h1 class="text-4xl font-bold text-center">Encurte URLs de forma rápida e fácil</h1>
                <p class="text-center text-muted-foreground">Transforme links longos em URLs curtas e fáceis de
                    compartilhar.
                </p>
            </div>

            <form action="{{ route('shorten') }}" method="POST" class="p-8 flex flex-col sm:flex-row gap-4 items-center">
                @csrf
                <input type="text" name="long_url" id="url" class="p-2 flex-1 border rounded"
                    placeholder="Cole a sua URL longa aqui" value="{{ old('long_url') }}" required />
                <button type="submit"
                    class="flex cursor-pointer text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Encurtar</button>
            </form>

            @if ($errors->any())
                <div class="w-full p-8">
                    <div class="p-4 border rounded-md bg-red-100 text-red-800">
                        {{ $errors->first() }}
                    </div>
                </div>
            @endif

            @if (session('short_url'))
                <div class="w-full p-8">
                    <div class="flex p-4 flex-row gap-4 border rounded-md">
                        <input id="short_url" class="flex-1 border rounded p-2" id="short_url"
                            value="{{ session('short_url') }}" type="text" disabled />
                        <button
                            class="flex items-center justify-center p-2 bg-indigo-500 text-white rounded hover:bg-indigo-600"
                            onclick="navigator.clipboard.writeText('{{ session('short_url') }}')">
                            <x-fas-share class="w-6 h-6" />
                        </button>
                    </div>
                </div>
            @endif
        </section>
        <section class="pt-24">
            <h2 class="text-center text-2xl">Como funciona?</h2>
            <p class="text-center">Comece em segundos com esses 3 passos</p>
            <div class="mx-auto grid max-w-5xl items-start gap-6 py-12 lg:grid-cols-3 lg:gap-12">
                <div class="flex flex-col items-center space-y-4 text-center">
                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-black text-white text-2xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-bold">Cole a sua URL</h3>
                    <p class="text-muted-foreground">Cole a sua URL longa no nosso encurtador acima.</p>
                </div>
                <div class="flex flex-col items-center space-y-4 text-center">
                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-black text-white text-2xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-bold">Obtenha a URL curta</h3>
                    <p class="text-muted-foreground">
                        Receba instantaneamente uma URL curta que é fácil de compartilhar e lembrar.
                    </p>
                </div>
                <div class="flex flex-col items-center space-y-4 text-center">
                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-black text-white text-2xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-bold">Compartilhe</h3>
                    <p class="text-muted-foreground">
                        Compartilhe o seu link em qualquer lugar.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('public.footer')
    <footer class="flex flex-row justify-between px-8 py-4 border-t">
        <p>&copy; {{ date('Y') }} Thitiny URL</p>
    </footer>
@endsection

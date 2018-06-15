<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom Laravel object: used for accessing global PHP inside JS. -->
    <script>
        window.Laravel = {
            appName: '{{ config('app.name') }}'
        }
    </script>
</head>
<body class="min-h-screen flex flex-col antialiased bg-beige font-sans leading-tight text-grey-darkest">
    <header class="bg-white border-b p-4 mb-8">
        <div class="container mx-auto">
            <nav class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-8 md:m-0">
                    <a href="/" class="no-underline hover:text-orange">
                        @include('icons.logo')
                    </a>
                </div>
                <div>
                    @guest
                    <a href="{{ route('login') }}" class="border border-grey-light text-grey-darkest py-2 px-4 flex items-center hover:bg-grey-lightest no-underline">
                        @include('icons.user-add')
                        Login
                    </a>
                    @endguest

                    @auth
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="flex items-center md:mr-8 mb-2 md:mb-0">
                            <img class="w-8 h-8 rounded-full border p-px mr-1" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                            <span class="text-sm md:text-base">{{ Auth::user()->name }}</span>
                        </div>
                        <a href="{{ route('talks.create') }}" class="text-grey-darkest py-2 px-4 flex items-center hover:bg-grey-lightest no-underline mr-3 mb-2 md:mb-0">
                            @include('icons.plus-round')
                            Submit a Talk
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center py-2 px-3 bg-red bg:red-dark text-white no-underline rounded"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                        @include('icons.arrow-right-circle')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endauth
            </div>
        </nav>
    </div>
</header>

<main class="flex-1 px-4" id="app" v-cloak>
    @yield('body')
</main>

<footer class="bg-grey-light py-8 mt-8">
    <div class="container mx-auto">
        <h4 class="text-center">
            A project by <a class="text-black font-bold no-underline" href="https://twitter.com/wilburpowery" target="_blank">Wilbur Powery</a>
            | Copyright {{ now()->year }}
        </h4>
    </div>
</footer>

@stack('beforeScripts')
<script src="{{ mix('js/app.js') }}"></script>
@stack('afterScripts')
</body>
</html>

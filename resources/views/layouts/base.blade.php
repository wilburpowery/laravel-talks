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
<body class="min-h-screen flex flex-col antialiased bg-grey-lighter font-sans leading-tight text-black">
    <header class="bg-white p-4 border-b">
        <div class="container mx-auto">
            <nav class="flex items-center justify-between">
                <div>
                    <h1>laravel Talks</h1>
                </div>
                <div>
                    @guest
                    <a href="{{ route('login') }}" class="flex items-center py-2 px-3 bg-green hover:bg-green-dark text-white no-underline rounded">
                        <svg class="fill-current w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
                        Login
                    </a>
                    @endguest

                    @auth
                    <div class="flex items-center">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <a href="{{ route('login') }}" class="flex items-center py-2 px-3 bg-red bg:red-dark text-white no-underline rounded">
                            <svg class="fill-current w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
                            Logout
                        </a>
                    </div>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-1 px-4" id="app" v-cloak>
        @yield('body')
    </main>

    <footer>
        footer
    </footer>

    @stack('beforeScripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('afterScripts')
</body>
</html>

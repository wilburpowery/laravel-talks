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
<body class="min-h-screen flex flex-col antialiased bg-beige font-sans leading-tight text-black">
    <header class="bg-white border-b p-4 mb-8">
        <div class="container mx-auto">
            <nav class="flex items-center justify-between">
                <div>
                    <h1>Laravel Talks</h1>
                </div>
                <div>
                    @guest
                    <a href="{{ route('login') }}" class="border border-grey-light text-grey-darkest py-2 px-4 flex items-center hover:bg-grey-lightest no-underline">
                        <svg class="w-4 h-4 fill-current mr-2" aria-labelledby="simpleicons-github-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title id="simpleicons-github-icon">GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                        Login
                    </a>
                    @endguest

                    @auth
                    <a href="{{ route('talks.store') }}" class="border border-grey-light text-grey-darkest py-2 px-4 flex items-center hover:bg-grey-lightest no-underline">
                        <svg class="w-4 h-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                        Create Talk
                    </a>

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

@extends('layouts.base')

@section('body')
    <div class="container mx-auto">
        <h1 class="mb-6">Latests Talks</h1>
        <div class="flex flex-wrap -mx-4">
            @foreach($talks as $talk)
                <div class="w-full md:w-1/2 px-4 mb-8">
                    <div class="flex flex-col h-full bg-white shadow-md rounded-lg">
                        <header class="mb-3 relative">
                            <img src="https://i.ytimg.com/vi/ByjMirknC9U/maxresdefault.jpg" alt="{{ $talk->title }}">
                            <a href="https://google.com">
                                <img class="w-10 h-10 rounded-full absolute pin-b shadow" style="right: 10px;" src="https://avatars3.githubusercontent.com/u/15817188?s=460&v=4" alt="">
                            </a>
                        </header>
                        <main class="flex-1 p-4 mb-6">
                            <div class="mb-3">
                                <h4 class="mb-3">{{ $talk->title }}</h4>
                                {{ $talk->description }}
                            </div>

                            <p class="flex items-center text-orange font-bold text-sm mb-1">
                                &#9670;
                                <a href="{{ $talk->slides_url }}" class="text-orange ml-2 no-underline">
                                    Slides
                                </a>
                            </p>

                            <p class="flex items-center text-orange font-bold text-sm mb-1">
                                &#9670;
                                <a href="{{ $talk->video_url }}" class="text-orange ml-2 no-underline">
                                    Video
                                </a>
                            </p>
                        </main>
                        <footer class="bg-grey-lightest flex flex-row justify-between p-4">
                            <button class="border border-grey-light text-grey-darkest py-2 px-4 flex items-center hover:bg-grey-light">
                                <svg class="w-6 h-6 mr-2 fill-current text-red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"/></svg>
                                {{ $talk->likes_count }}
                            </button>

                            <button class="text-xs font-bold">
                                Give this talk at my conference >
                            </button>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

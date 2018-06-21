@extends('layouts.base')

@section('body')
    <div class="container mx-auto">
        <h1 class="mb-6">Latests Talks</h1>
        <div class="flex flex-wrap -mx-4">
            @forelse($talks as $talk)
                <div class="w-full md:w-1/3 px-4 mt-4 mb-8">
                    <div class="flex flex-col h-full bg-white shadow-md rounded-lg">
                        <header class="mb-3 relative">
                            <img src="{{ $talk->thumbnail_url }}" alt="{{ $talk->title }}">
                            <a href="https://github.com/{{ $talk->user->nickname }}">
                            <img class="w-10 h-10 rounded-full absolute pin-b shadow" style="right: 10px;" src="{{ $talk->user->avatar }}" alt="{{ $talk->user->name }}">
                            </a>
                        </header>
                        <main class="flex-1 p-4 mb-6">
                            <div class="mb-3">
                                <h3 class="mb-3">{{ $talk->title }}</h3>
                                {{ $talk->description }}
                            </div>

                            <p class="flex items-center text-orange font-bold text-sm mb-1">
                                &#9670;
                                <a href="{{ $talk->slides_url }}" class="text-orange ml-2 no-underline">
                                    Slides
                                </a>
                            </p>

                            @if($talk->video_url)
                                <p class="flex items-center text-orange font-bold text-sm mb-1">
                                    &#9670;
                                    <a href="{{ $talk->video_url }}" class="text-orange ml-2 no-underline">
                                        Video
                                    </a>
                                </p>
                            @endif
                        </main>
                        <footer class="bg-grey-lightest flex flex-row justify-between p-4">
                            <talk-likes :talk="{{ $talk }}"></talk-likes>
                            @if(Auth::check())
                            <contact-speaker-button :talk="{{ $talk }}"></contact-speaker-button>
                            @endif
                        </footer>
                    </div>
                </div>

                @empty
                    <p class="w-full text-center">No talks at the moment. Consider submitting a talk you have given! 😊</p>
            @endforelse
        </div>
        <nav class="my-8">
            {{ $talks->links() }}
        </nav>
    </div>
@endsection

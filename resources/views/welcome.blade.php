@extends('layouts.base')

@section('body')
<div class="bg-red flex flex-col items-center justify-center min-h-screen text-white">
    <h1 class="font-sans uppercase mb-8">A growing database of Laravel related talks</h1>
    <div class="flex items-center mb-8">
        <h2 class="mr-2">Got a Laravel talk?</h2>
        <a class="bg-indigo-light p-3 text-white no-underline rounded-lg" href="{{ route('login') }}">Add it!</a>
    </div>

    <a class="text-white no-underline rounded-lg" href="#">Latest Talks</a>
</div>
@endsection

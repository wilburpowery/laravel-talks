@extends('layouts.base')

@section('body')
    <div class="container mx-auto">
        <div class="flex mt-6">
            <div class=" w-full lg:w-1/2 mx-auto">
                <div class="bg-white border p-6 rounded-lg">
                    <form action="{{ route('login') }}">
                        <div class="my-4">
                            <label for="email" class="block font-bold mb-2">Email</label>
                            <input type="email" name="email" class="shadow-inner bg-grey-lighter w-full p-3" id="email" value="{{ old('email') }}" placeholder="Email Address">
                        </div>

                        <div class="my-4">
                            <label for="password" class="block font-bold mb-2">Password</label>
                            <input type="password" name="password" class="shadow-inner bg-grey-lighter w-full p-3" id="password" value="{{ old('email') }}" placeholder="******">
                        </div>

                        <div class="my-4">
                            <button class="flex items-center py-2 px-3 bg-green hover:bg-green-dark text-white no-underline rounded">
                                <svg class="fill-current w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

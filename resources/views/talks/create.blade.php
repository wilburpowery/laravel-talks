@extends('layouts.base')

@section('header-scripts')
    {!! $uploadcare->api()->widget->getScriptTag() !!}
@endsection

@section('body')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center -mx-4">
            <div class="w-full md:w-2/3 lg:w-1/2 px-4">
                <div class="bg-white p-4 shadow">
                    @if($errors->any())
                        <div class="bg-red-light p-3 text-white mb-3">
                            <ul class="list-reset">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2 class="mb-6">Add your talk</h2>

                    <form action="{{ route('talks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="title" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Title (*)</label>
                            <input type="text" name="title" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" id="title" placeholder="Learning Laravel" required>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Description (*)</label>
                            <textarea type="text" name="description" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight mb-2" id="description" placeholder="Let's learn some Laravel" rows="4" required></textarea>
                            <p class="text-grey-dark text-xs italic">Make your description as long as you need, you have no limit here.</p>
                        </div>

                        <div class="mb-6">
                            <label for="slides_url" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Slides URL (*)</label>
                            <input type="url" name="slides_url" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" id="slides_url" placeholder="https://speakerdeck.com/johndoe/awesome-talk" required>
                        </div>

                        <div class="mb-6">
                            <label for="video_url" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Video URL</label>
                            <input type="url" name="video_url" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight mb-2" id="video_url" placeholder="https://youtube.com/johndoe/awesome-talk">
                            <p class="text-grey-dark text-xs italic">Don't have a video recording of your talk? No problem, leave it blank.</p>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Thumbnail (*)</label>
                            {!! $uploadcare->api()->widget->getInputTag('image', [
                            'data-crop' => '700x350 minimum',
                            'data-image-only'
                            ]) !!}
                        </div>

                        <div class="mb-6">
                            <label for="slides_url" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Want to be contacted about your talk?</label>
                            <label for="available_to_speak" class="block cursor-pointer mb-2">
                                <input type="checkbox" name="available_to_speak" id="available_to_speak">
                                Yes
                            </label>
                            <p class="text-grey-dark text-xs italic">Users will be able to contact you if they want your talk at their conference.</p>
                        </div>


                        <div class="flex justify-center">
                            <button class="w-full md:w-1/2 shadow bg-purple hover:bg-purple-light text-white font-bold py-2 px-6 rounded">
                                Add
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

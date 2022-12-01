<x-layout>

    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />

        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />

        </div>
    </main>

    {{-- @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">

                <h1>{{ $post->title }}</h1>
            </a>
            <p>
                By <a href="/authors/{{ $post->author->userName }}">{{$post->author->name}}</a> in <a href="/catagory/{{ $post->catagory->slug }}"> {{ $post->catagory->name }} </a>
             </p>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach --}}
</x-layout>

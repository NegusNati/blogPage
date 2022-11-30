<x-layout>

    @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">

                <h1>{{ $post->title }}</h1>
            </a>
            <p>
               <a href="/catagory/{{ $post->catagory->slug }}"> {{ $post->catagory->name }} </a>
            </p>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
</x-layout>

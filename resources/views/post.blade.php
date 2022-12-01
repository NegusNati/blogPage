<x-layout>

    <article>
        <h1>{!! $post->title !!}</h1>
        <p>
            By <a href="/authors/{{ $post->author->userName }}">{{$post->author->name}}</a> in <a href="/catagory/{{ $post->catagory->slug }}"> {{ $post->catagory->name }} </a>
         </p>

        <div>{!! $post->body !!}</div>
    </article>
    <a href="/">Return Back</a>

</x-layout>

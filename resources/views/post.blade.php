<x-layout>

    <article>
        <h1>{!! $post->title !!}</h1>
        <p>
            By <a href="#">{{ $post->user->name}}</a> in <a href="/catagories/{{ $post->catagory->id }}"> {{ $post->catagory->name }} </a>
         </p>

        <div>{!! $post->body !!}</div>
    </article>
    <a href="/">Return Back</a>

</x-layout>

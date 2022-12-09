@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->id}}" alt="picture" width="70" height="70" class="rounded-xl">
    </div>
    <div>
        <header>
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <p class="text-xs">Posted
                <time>{{$comment->created_at}}</time>
            </p>
        </header>
        <p class="mt-6">
            {{$comment->body}}
        </p>
    </div>
</article>

@props(['comment'])

<x-panel class="flex bg-gray-50 space-x-4">

    <article>
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="picture" width="70" height="70"
                 class="rounded-xl">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->author->name}}</h3>
                <p class="text-xs">Posted
                    <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time>
                </p>
            </header>
            <p class="mt-6">
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>

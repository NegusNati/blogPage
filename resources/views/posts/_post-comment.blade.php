@auth
<x-panel>

    <form method="post" action="/posts/{{ $post->slug}}/comments">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="picture" width="40" height="40"
                class="rounded-full">
            <h1 class="ml-4">Want to Participate?</h1>
        </header>
        <div class="mt-4">
            <textarea name="body" placeholder="have any thoughts?" cols="30" rows="5"
                class="w-full text-sm border border-blue-200 p-2 focus:outline-none focus:ring" required></textarea>
            @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>

            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-400 font-semibold m-1 px-8 py-3 rounded-2xl text-white text-xs uppercase hover:bg-blue-600">Send</button>
        </div>

    </form>

</x-panel>
@else
<p class="font-semibold">
    <a href="/login" class="hover:underline">Log In</a> or <a href="/register" class="hover:underline">Register</a> to
    Comment!
</p>

@endauth

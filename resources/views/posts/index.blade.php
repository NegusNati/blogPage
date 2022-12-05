<x-layout>

    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
        <x-posts-grid :posts="$posts" />
        {{ $posts->links() }} {{--render pagination links using links() method--}}
        @else
        <p class="text-center"> There are no Posts, come Back later</p>

        @endif




    </main>
</x-layout>

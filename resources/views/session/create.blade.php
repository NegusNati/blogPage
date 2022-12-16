<x-layout>


    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>

                <h1 class="text-center text-xl font-bold">Log In!</h1>


                <form method="post" action="/session" class="mt-10">
                    @csrf


                    <x-form.input name="email" type="email"  autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <x-submit-button> Log In</x-submit-button>

                    </div>
                    {{-- @if($errors->any())--}}
                    {{-- <ul>--}}
                        {{-- @foreach($errors->all() as $error)--}}
                        {{-- <li class="text-red-500 text-xs">{{ $error }}</li>--}}
                        {{-- @endforeach--}}
                        {{-- </ul>--}}
                    {{-- @endif--}}

                </form>

            </x-panel>


        </main>
    </section>
</x-layout>

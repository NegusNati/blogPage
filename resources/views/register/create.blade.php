<x-layout>


    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center text-xl font-bold">Register</h1>
                <form method="post" action="/register" class="mt-10">
                    @csrf
                    <x-form.input name="name" />
                    <x-form.input name="userName" autocomplet="off"/>
                    <x-form.input name="email" type="email" autocomplet="off" />
                    <x-form.input name="password" type="password" autocomplet="off" />


                    <x-submit-button>Submit</x-submit-button>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                </form>

            </x-panel>


        </main>
    </section>
</x-layout>

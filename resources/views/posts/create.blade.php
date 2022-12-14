<x-layout>
    <x-panel class="m-10 max-w-lg mx-auto border border-gray-300">

        <section class="px-6 py-8">
            <h1 class="text-xl font-extrabold mb-6 px-2 ">
                Publish New Post Here
            </h1>

            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />

                <x-form.fields>
                    <x-form.label name="catagory" />

                    <select name="catagory_id" id="catagory_id">

                        @php
                        $catagories = App\Models\Catagory::all();

                        @endphp

                        @foreach ($catagories as $catagory )
                        <option value="{{$catagory->id}}" {{ old('catagory_id')==$catagory->id ? 'selected' :
                            ''}}>{{ucwords($catagory->name)}}</option>

                        @endforeach

                    </select>
                    <x-form.error name="catagory" />
                </x-form.fields>

                <x-submit-button class="justify-end">Publish</x-submit-button>
            </form>
        </section>
    </x-panel>


</x-layout>

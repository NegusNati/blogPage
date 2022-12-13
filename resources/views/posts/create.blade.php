<x-layout>
    <x-panel class="m-10 max-w-sm mx-auto">
        <section class="px-6 py-8">

            <form method="POST" action="/admin/posts">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ old('title') }}" required>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt"
                        required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-96 h-40 rounded-xl" type="text" name="body" id="body"
                        required>{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="block mb-2 font-bold text-xs text-gray-700" for="catagory_id">
                        Catagory
                    </label>
                    <select name="catagory_id" id="catagory_id" >

                        @php
                        $catagories = App\Models\Catagory::all();

                        @endphp

                        @foreach ($catagories as $catagory )
                        <option value="{{$catagory->id}}" {{ old('catagory_id')==$catagory->id ? 'selected' :
                            ''}}>{{ucwords($catagory->name)}}</option>

                        @endforeach

                    </select>

                    @error('catagory_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button class="justify-end">Post</x-submit-button>
            </form>
        </section>
    </x-panel>


</x-layout>

<x-layout>

    <x-setting :heading="'Edit a Post Here: ' . $post->title ">


        <form method="POST" action="/admin/posts/update/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title',$post->title) " />
            <x-form.input name="slug" :value="old('slug',$post->slug)"  />
            <x-form.input name="thumbnail" type="file" :value="old('thimbnail',$post->thumbnail)"  />

            <x-form.textarea name="excerpt" >{{ old('excerpt', $post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body" >{{ old('body', $post->body)}}</x-form.textarea>


            <x-form.fields>
                <x-form.lable name="catagory"></x-form.lable>

                <select name="catagory_id" id="catagory">

                    @php
                    $catagories = App\Models\Catagory::all();

                    @endphp

                    @foreach ($catagories as $catagory )
                    <option value="{{$catagory->id}}" {{ old('catagory_id', $post->catagory_id)==$catagory->id ? 'selected' :
                        ''}}>{{ucwords($catagory->name)}}</option>

                    @endforeach

                </select>
            </x-form.fields>


            <x-form.error name="catagory" />


            <x-submit-button class="justify-end">Update</x-submit-button>
        </form>

    </x-setting>




</x-layout>

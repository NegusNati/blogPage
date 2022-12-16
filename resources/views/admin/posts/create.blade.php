<x-layout>

    <x-setting heading=" Publish New Post Here">


        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.fields>
                <x-form.lable name="catagory"></x-form.lable>

                <select name="catagory_id" id="catagory_id">

                    @php
                    $catagories = App\Models\Catagory::all();

                    @endphp

                    @foreach ($catagories as $catagory )
                    <option value="{{$catagory->id}}" {{ old('catagory_id')==$catagory->id ? 'selected' :
                        ''}}>{{ucwords($catagory->name)}}</option>

                    @endforeach

                </select>
            </x-form.fields>


            <x-form.error name="catagory" />


            <x-submit-button class="justify-end">Publish</x-submit-button>
        </form>

    </x-setting>




</x-layout>

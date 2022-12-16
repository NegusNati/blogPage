@props(['name'])

<x-form.fields>
    <x-form.lable name="{{$name}}"></x-form.lable>
    <input class="border border-blue-200 p-2 w-full rounded-xl" name="{{$name}}"
     id="{{$name}}"
     {{ $attributes(['value'=> old($name)]) }}
    >
    <x-form.error name="{{$name}}" />
</x-form.fields>

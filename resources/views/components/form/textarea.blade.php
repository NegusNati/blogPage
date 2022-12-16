@props(['name'])

<x-form.fields >
  <x-form.lable name="{{$name}}"></x-form.lable>

  <textarea class="border border-blue-200 p-2  w-96 h-20 rounded-xl" type="text " name="{{$name}}" id="{{$name}}"
    required
    {{ $attributes}}
    >{{ $slot ?? old($name) }}</textarea>
  <x-form.error name="{{$name}}" />


</x-form.fields>

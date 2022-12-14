@props(['name'])

<x-form.fields >
  <x-form.lable name="{{$name}}" />

  <textarea class="border border-gray-400 p-2  w-96 h-20 rounded-xl" type="text " name="{{$name}}" id="{{$name}}"
    required>{{ old($name) }}</textarea>
  <x-form.error name="{{$name}}" />


</x-form.fields>

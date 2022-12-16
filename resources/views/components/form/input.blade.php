@props(['name'])

<x-form.fields>
  <x-form.lable name="{{$name}}"></x-form.lable>
  <input class="border border-blue-200 p-2 w-full rounded-xl"
    name="{{$name}}"
    id="{{$name}}"
    value="{{ old($name) }}"
     required
    {{ $attributes }}
    >
  <x-form.error name="{{$name}}" />
</x-form.fields>

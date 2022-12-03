@props(['trigger'])

<div x-data="{ show: false }" @click.away="show=false">

    {{--Trigger--}}
    <div @click="show= ! show">
        {{ $trigger}}
    </div>
{{--Drop down link--}}
    <div x-show="show" class="py-2 absolute bg:gray-100 w-full mt-2 z-50 " style="display: none">
        {{$slot}}

    </div>
</div>

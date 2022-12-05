<x-dropdown-button>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex  ">
            {{ isset($currentCatagory) ? ucwords($currentCatagory->name) : 'Catagory' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
    @foreach ($catagories as $catagory)
        {{-- {{ isset($currentCatagory) && $currentCatagory->is($catagory) ? 'bg-blue-300 text-white' : '' }} --}}
        <x-dropdown-item
            href="/?catagory={{ $catagory->slug }}&{{ http_build_query(request()->except('catagory')) }}"
            :active='request()->is("catagories/{$catagory->slug}")'>
            {{ ucwords($catagory->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown-button>

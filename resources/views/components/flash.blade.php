@if(session()->has('success'))
    <div x-data="{ show: true}"
         x-init="setTimeout(()=> show = false,4000)"
         x-show="show"
         class="bg-blue-500 bottom-4 fixed px-2 py-2 right-3 rounded rounded-xl text-sm text-white">
        <p>
            {{ session()->get('success') }}
        </p>
    </div>
@endif

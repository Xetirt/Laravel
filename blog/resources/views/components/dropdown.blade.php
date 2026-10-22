<div class="" x-data="{ open: false}">
    <button @click="open =! open" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" >
        {{ $trigger }}
    </button>
    <div x-show="open"
    @click.away = "open = false"
    x-transition
    class="absolute right-0 mt-2 w-48 bg-white border-gray-200 rounded-lg shadow-lg py-1 z-50"
    style="display:none">
    {{ $slot }}
</div>
</div>
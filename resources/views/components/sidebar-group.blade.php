@props(['title'])

<div x-data="{ open: false }" class="space-y-1">
    <button @click="open = !open"
        class="group flex items-center justify-between w-full px-3 py-2 rounded-lg text-sm font-medium
               text-gray-300 hover:text-sky-300
               hover:bg-sky-500/10 transition">
        <div class="flex items-center">
            {{ $title }}
        </div>
        <span class="transition-transform duration-200" :class="open ? 'rotate-90' : ''">
            <x-lucide-chevron-right class="w-4 h-4 text-gray-500 group-hover:text-sky-300" />
        </span>
    </button>

    <div x-show="open" class="pl-6 space-y-2" x-transition>
        <div class="border-l pl-2 border-gray-700 space-y-1">
            {{ $slot }}
        </div>
    </div>
</div>

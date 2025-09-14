@props([ 'title', 'href' => '#', 'active' => false, 
  'subLinks' => [],
])

<div x-data="{ open: {{ count($subLinks) ? 'false' : 'true' }} }" class="w-full">
    {{-- Parent Link --}}
    <a 
        @if(count($subLinks)) @click.prevent="open = !open" @endif
        href="{{ count($subLinks) ? '#' : $href }}" 
        class="flex items-center justify-between p-2 rounded-lg transition-colors duration-200 cursor-pointer
               border-l-2 border-transparent {{ $active ? 'bg-gray-100' : 'hover:bg-gray-50' }}"
    >
        <div class="flex items-center space-x-2">
            {{-- Icon --}}
            @isset($icon)
                {{ $icon }}
            @endisset
            <span class="text-gray-700">{{ $title }}</span>
        </div>

        {{-- Collapse Arrow --}}
        @if(count($subLinks))
            <svg :class="{'rotate-90': open}" class="w-4 h-4 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        @endif
    </a>

    {{-- Sub-links --}}
    @if(count($subLinks))
        <div x-show="open" x-collapse
            x-transition:enter="transition-all duration-300 ease-out"
            x-transition:enter-start="opacity-0 max-h-0"
            x-transition:enter-end="opacity-100 max-h-40"
            x-transition:leave="transition-all duration-200 ease-in"
            x-transition:leave-start="opacity-100 max-h-40"
            x-transition:leave-end="opacity-0 max-h-0"
            class="mt-2 ml-4 space-y-1 overflow-hidden"
        >
            @foreach($subLinks as $sub)
                <a href="{{ $sub['href'] }}" 
                   class="block px-4 py-1.5 transition-colors duration-200 border-l-2 rounded-r-lg
                          {{ request()->url() == $sub['href'] ? 'border-violet-500 text-violet-600 bg-violet-100 font-semibold' : 'border-gray-200 text-gray-500 hover:bg-violet-50 hover:border-violet-400 hover:text-violet-600' }}">
                    {{ $sub['title'] }}
                </a>
            @endforeach
        </div>
    @endif
</div>

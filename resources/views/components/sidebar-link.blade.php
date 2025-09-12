@props(['href'])

@php
    $active = request()->url() === $href;
@endphp

<a href="{{ $href }}"
   class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-colors
          {{ $active 
              ? 'bg-sky-500/10 text-sky-300' 
              : 'text-gray-300 hover:bg-sky-500/10 hover:text-sky-300' 
         }}">
    {{ $slot }}
</a>

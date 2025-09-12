@props(['href'])

@php
    $active = request()->url() === $href;
@endphp

<a href="{{ $href }}"
   class="flex items-center px-3 py-1.5 rounded-lg text-sm font-medium transition-colors
          {{ $active 
              ? 'bg-sky-700/10 text-sky-500' 
              : 'text-gray-400 hover:bg-sky-700/10 hover:text-sky-500' 
         }}">
    {{ $slot }}
</a>

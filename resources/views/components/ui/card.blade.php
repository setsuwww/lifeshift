@props([
    'title' => null,
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-gray-700 bg-gray-800 overflow-hidden']) }}>
    {{-- Header --}}
    @isset($header)
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-700">
            <div>
                @if($title)
                    <div class="text-sm font-semibold text-gray-300">{{ $title }}</div>
                @endif
                @if($subtitle)
                    <div class="text-xs text-gray-400">{{ $subtitle }}</div>
                @endif
            </div>
            <div class="flex items-center gap-2">
                {{ $header }}
            </div>
        </div>
    @endisset

    {{-- Content --}}
    <div class="p-4 text-sm text-gray-300">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    @isset($footer)
        <div class="px-4 py-3 border-t border-gray-700 text-xs text-gray-400">
            {{ $footer }}
        </div>
    @endisset
</div>

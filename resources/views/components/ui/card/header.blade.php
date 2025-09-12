<div {{ $attributes->merge(['class' => 'flex items-center justify-between px-4 py-3 border-b border-gray-700']) }}>
    <div>
        @isset($title)
            <div class="text-sm font-semibold text-gray-300">{{ $title }}</div>
        @endisset
        @isset($subtitle)
            <div class="text-xs text-gray-400">{{ $subtitle }}</div>
        @endisset
    </div>
    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>
</div>

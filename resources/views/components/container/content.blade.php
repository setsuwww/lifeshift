<section {{ $attributes->merge(['class' => 'container mx-auto bg-gray-800 border border-gray-700 rounded-xl']) }}>
    <header class="flex justify-between items-center mb-2 px-6 py-4 border-b border-gray-700">
        <div>
            <h3 class="text-2xl font-bold">{{ $title }}</h3>
            @if (!empty($subtitle))
                <h4 class="text-sm font-semibold text-gray-500">{{ $subtitle }}</h4>
            @endif
        </div>

        @if (!empty($create))
            {{ $create }}
        @endif
    </header>

    <div class="px-6 py-2">
        @if(!empty($action))
            {{ $action }}
        @endif
    </div>

    <main class="mb-6 px-6 py-4">
        {{ $slot }}
    </main>

    @if (!empty($footer))
        <footer class="pt-4 border-t border-gray-700">
            {{ $footer }}
        </footer>
    @endif
</section>

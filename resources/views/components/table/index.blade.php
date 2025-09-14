@props(['striped' => false])

<div class="overflow-x-auto rounded-lg border-0 border-t border-gray-600">
    <table class="min-w-full text-sm text-left text-gray-300">
        {{ $slot }}
    </table>
</div>

@props([
  'caption' => null,
  'compact' => false,
  'emptyMessage' => 'No data found.'
])

<div class="w-full overflow-hidden rounded-2xl border border-gray-700 bg-gray-800">
  {{-- toolbar --}}
  @isset($toolbar)
    <div class="flex items-center justify-between gap-2 p-3 border-b border-gray-700">
      {{ $toolbar }}
    </div>
  @endisset

  <div class="w-full overflow-auto">
    <table class="min-w-full divide-y divide-gray-700">
      @if($caption)
        <caption class="sr-only">{{ $caption }}</caption>
      @endif

      {{-- head --}}
      @isset($head)
        <thead class="text-xs uppercase tracking-wider text-[--color-secondary] bg-gray-800">
          {{ $head }}
        </thead>
      @endisset

      {{-- body --}}
      <tbody class="text-sm divide-y divide-gray-700">
        @isset($body)
          @if(trim($body) === '')
            <tr>
              <td colspan="100" class="p-4 text-center text-[--color-secondary]">
                {{ $emptyMessage }}
              </td>
            </tr>
          @else
            {{ $body }}
          @endif
        @else
          <tr>
            <td colspan="100" class="p-4 text-center text-[--color-secondary]">
              {{ $emptyMessage }}
            </td>
          </tr>
        @endisset
      </tbody>
    </table>
  </div>

  {{-- footer --}}
  @isset($footer)
    <div class="p-3 border-t border-gray-700">
      {{ $footer }}
    </div>
  @endisset
</div>

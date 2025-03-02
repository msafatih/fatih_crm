<div class="space-y-6">
    <div class="flex items-center space-x-2 text-{{ $color }}-600">
        @if ($icon)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="{{ $icon }}" clip-rule="evenodd" />
            </svg>
        @endif
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>

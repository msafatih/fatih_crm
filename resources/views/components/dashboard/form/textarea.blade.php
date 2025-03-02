<div class="space-y-2">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative rounded-md shadow-sm">
        @if ($icon)
            <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd" d="{{ $icon }}" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
        <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
            @if ($required) required @endif
            class="{{ $icon ? 'pl-10' : 'pl-3' }} mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
            placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

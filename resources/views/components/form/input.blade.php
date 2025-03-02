@props([
    'type' => 'text',
    'name',
    'id',
    'label',
    'icon',
    'placeholder' => '',
    'value' => '',
])

<div class="space-y-2 group">
    <label for="{{ $id }}" class="text-sm font-medium text-gray-700 block flex items-center">
        <i class="fas fa-{{ $icon }} text-blue-500 mr-2"></i>
        {{ $label }}
    </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-{{ $icon }} text-blue-500 group-hover:text-blue-600 transition-colors"></i>
        </div>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 hover:bg-white transition-all"
            placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $attributes }}>
    </div>
    @error($name)
        <p class="text-red-500 text-xs mt-1 flex items-center">
            <i class="fas fa-exclamation-circle mr-1"></i>
            {{ $message }}
        </p>
    @enderror
</div>

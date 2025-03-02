@props(['value', 'label'])

<div
    class="bg-white bg-opacity-5 p-4 rounded-xl fade-in border border-white border-opacity-10 hover:bg-opacity-10 transition-all duration-300">
    <div class="text-3xl font-bold text-white">{{ $value }}</div>
    <p class="text-sm text-blue-100">{{ $label }}</p>
</div>

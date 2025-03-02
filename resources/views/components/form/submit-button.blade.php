@props([
    'icon' => 'sign-in-alt',
    'text' => 'Submit',
])

<button type="submit"
    {{ $attributes->merge(['class' => 'w-full flex items-center justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform transition-all hover:scale-[1.02] duration-300']) }}>
    <i class="fas fa-{{ $icon }} mr-2 flex-shrink-0"></i>
    <span>{{ $text }}</span>
</button>

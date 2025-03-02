<a href="{{ route($route) }}" aria-current="{{ request()->routeIs($route) ? 'page' : 'false' }}"
    class="group flex items-center px-3 lg:px-4 py-2.5 lg:py-3.5 rounded-xl transition-all duration-300
    {{ request()->routeIs($route)
        ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/30 scale-105'
        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:shadow-md hover:scale-[1.02]' }}">
    <div class="relative">
        <i class="{{ $icon }}"></i>
        @if (request()->routeIs($route))
            <span class="absolute -right-1 -top-1 w-1.5 h-1.5 lg:w-2 lg:h-2 bg-white rounded-full"></span>
        @endif
    </div>
    <span class="ml-3 lg:ml-4 font-semibold tracking-wide hidden sm:inline-block">
        {{ $label }}
    </span>
</a>

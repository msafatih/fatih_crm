<div class="flex-shrink-0 px-6 py-6 border-b border-gray-100 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800">
    <div class="flex items-center space-x-4">
        <div class="relative group/profile flex-shrink-0">
            @if ($image)
                <div class="relative overflow-hidden h-12 w-12 lg:h-16 lg:w-16 rounded-full">
                    <img class="h-full w-full object-cover ring-4 ring-white/20 transition-all duration-300 group-hover/profile:scale-110 group-hover/profile:ring-white/40"
                        src="{{ asset('storage/images/users/' . $image) }}" alt="{{ $name }}">
                </div>
            @else
                <div
                    class="h-12 w-12 lg:h-16 lg:w-16 rounded-full bg-blue-600 flex items-center justify-center ring-4 ring-blue-500/30 transition-all duration-300 group-hover/profile:ring-blue-500/50">
                    <span class="text-base lg:text-lg font-medium text-white">{{ $initials }}</span>
                </div>
            @endif

            <span
                class="absolute bottom-1 right-1 w-3 h-3 lg:w-4 lg:h-4 bg-emerald-400 border-2 border-white rounded-full shadow-lg animate-pulse"></span>
        </div>

        <div class="flex flex-col min-w-0 flex-1">
            <h2 class="text-lg lg:text-xl font-bold text-white truncate tracking-tight group/name relative"
                title="{{ $name }}">
                {{ $name }}
                <span
                    class="absolute left-0 -bottom-8 hidden group-hover/name:block bg-gray-900 text-white text-sm px-2 py-1 rounded whitespace-nowrap z-10">
                    {{ $name }}
                </span>
            </h2>
            <span class="text-xs lg:text-sm text-blue-100 font-medium tracking-wide truncate">
                {{ $role }}
            </span>
        </div>
    </div>
</div>

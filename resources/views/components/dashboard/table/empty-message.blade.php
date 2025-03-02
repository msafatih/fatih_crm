<tr>
    <td colspan="{{ count($columns) + ($hasActions ? 1 : 0) }}" class="px-6 py-16">
        <div class="flex flex-col items-center justify-center animate-fade-in">
            <div class="relative">
                <div class="absolute -inset-4 bg-blue-50/50 rounded-full blur-sm animate-pulse"></div>
                <div
                    class="bg-white rounded-full p-6 mb-4 shadow-sm relative border border-gray-100 transform transition-all duration-300 hover:scale-110">
                    <i
                        class="fas fa-{{ $icon }} text-4xl text-blue-400 transition-all duration-300 hover:text-blue-500"></i>
                </div>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2 mt-2 animate-fade-in-up delay-150">
                {{ $message }}
            </h3>
            <p class="text-sm text-gray-500 max-w-sm text-center leading-relaxed animate-fade-in-up delay-300">
                {{ $description }}
            </p>
        </div>
    </td>
</tr>

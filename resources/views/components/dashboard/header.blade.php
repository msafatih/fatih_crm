<div class="mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            @if ($icon)
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg">
                    <i class="fas fa-{{ $icon }} text-xl text-white"></i>
                </div>
            @endif

            <div>
                <h1 class="text-2xl font-bold text-gray-900 leading-tight">
                    {{ $title }}
                </h1>
                @if ($subtitle)
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
        </div>

        @if ($buttonLabel && ($buttonRoute || $buttonAction))
            <div>
                @if ($buttonRoute)
                    <a href="{{ route($buttonRoute) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        @if ($buttonIcon)
                            <i class="fas fa-{{ $buttonIcon }} -ml-1 mr-2"></i>
                        @endif
                        {{ $buttonLabel }}
                    </a>
                @endif

                @if ($buttonAction)
                    <button type="button" onclick="{{ $buttonAction }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        @if ($buttonIcon)
                            <i class="fas fa-{{ $buttonIcon }} -ml-1 mr-2"></i>
                        @endif
                        {{ $buttonLabel }}
                    </button>
                @endif
            </div>
        @endif
    </div>
</div>

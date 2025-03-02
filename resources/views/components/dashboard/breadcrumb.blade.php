<nav class="flex mb-8" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-4">
        @foreach ($items as $item)
            <li>
                @if (!$loop->last)
                    <div class="flex items-center">
                        @if (isset($item['route']))
                            <a href="{{ \App\View\Components\Dashboard\Breadcrumb::generateUrl($item) }}"
                                class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                @if (isset($item['icon']))
                                    <i class="fas fa-{{ $item['icon'] }} mr-2"></i>
                                @endif
                                {{ $item['label'] }}
                            </a>
                        @else
                            <span class="text-sm font-medium text-gray-500">
                                @if (isset($item['icon']))
                                    <i class="fas fa-{{ $item['icon'] }} mr-2"></i>
                                @endif
                                {{ $item['label'] }}
                            </span>
                        @endif
                        <i class="fas fa-chevron-right ml-4 text-gray-400"></i>
                    </div>
                @else
                    <span class="text-sm font-medium text-gray-900">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

<td @class([
    'px-6 py-4 whitespace-nowrap transition-colors duration-200',
    'text-sm font-medium text-gray-900' => $type === 'primary',
    'text-sm text-gray-600 group-hover:text-gray-900' => $type === 'secondary',
    'text-sm font-medium text-blue-600 hover:text-blue-900' => $type === 'link',
    'text-right' => $align === 'right',
    'text-center' => $align === 'center',
    'text-left' => $align === 'left' || !$align,
    $class ?? '',
])>
    {{ $slot }}
</td>

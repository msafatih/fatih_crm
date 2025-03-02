<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
    <div class="flex space-x-2">
        @if (in_array('view', $actions))
            <a href="{{ route($route . '.show', $item) }}" class="text-blue-600 hover:text-blue-900" title="View Details">
                <i class="fas fa-eye"></i>
            </a>
        @endif

        @if (in_array('edit', $actions))
            <a href="{{ route($route . '.edit', $item) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
        @endif

        @if (in_array('delete', $actions))
            <form action="{{ route($route . '.destroy', $item) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"
                    onclick="return confirm('Are you sure you want to delete this item?')" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        @endif
    </div>
</td>

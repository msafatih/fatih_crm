<nav
    class="flex-1 px-2 lg:px-4 py-4 lg:py-6 space-y-1 lg:space-y-2 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
    @foreach ($items as $item)
        @if (in_array($userRole, $item->roles))
            <x-sidebar.navigation-item :route="$item->route" :icon="$item->icon" :label="$item->label" :roles="$item->roles" />
        @endif
    @endforeach
</nav>

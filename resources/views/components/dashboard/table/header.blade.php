<thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
    <tr>
        @foreach ($columns as $column)
            <th scope="col"
                class="group px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider
                       transition-colors duration-200 hover:bg-gray-100 first:rounded-tl-lg">
                <div class="flex items-center space-x-1">
                    <span class="inline-flex items-center">
                        {{ $column }}
                    </span>
                    <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <i class="fas fa-sort text-gray-400 hover:text-blue-500 cursor-pointer"></i>
                    </span>
                </div>
            </th>
        @endforeach

        @if ($hasActions ?? true)
            <th scope="col"
                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider 
                       bg-gray-50/50 last:rounded-tr-lg">
                <span class="inline-flex items-center space-x-1">
                    <i class="fas fa-cog text-gray-400"></i>
                    <span>Actions</span>
                </span>
            </th>
        @endif
    </tr>
</thead>

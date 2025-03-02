<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['label' => 'Lead Management'],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header title="Lead Management" subtitle="Manage and track potential customers" icon="users"
                buttonLabel="Add New Lead" buttonRoute="leads.create" buttonIcon="plus" />

            <!-- Table Section -->
            <x-dashboard.table>
                <x-dashboard.table.header :columns="$columns" />
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($leads as $lead)
                        <x-dashboard.table.row>
                            <x-dashboard.table.cell>{{ $lead->id }}</x-dashboard.table.cell>
                            <x-dashboard.table.cell>
                                <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                                <div class="text-sm text-gray-500">{{ $lead->company }}</div>
                            </x-dashboard.table.cell>
                            <x-dashboard.table.cell>
                                <div class="text-sm text-gray-900">{{ $lead->email }}</div>
                                <div class="text-sm text-gray-500">{{ $lead->phone }}</div>
                            </x-dashboard.table.cell>
                            <x-dashboard.table.cell>
                                <x-dashboard.table.status-badge :status="$lead->status" />
                            </x-dashboard.table.cell>
                            <x-dashboard.table.action :item="$lead" route="leads" />
                        </x-dashboard.table.row>
                    @empty
                        <x-dashboard.table.empty-message :columns="$columns" message="No results found" icon="search"
                            description="Try changing your search criteria or clear filters to see more results." />
                    @endforelse
                </tbody>
            </x-dashboard.table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'leads.index', 'label' => 'Lead Management'],
                [
                    'route' => 'leads.show',
                    'params' => ['lead' => $lead],
                    'label' => $lead->name,
                ],
                ['label' => 'Detail Project'],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header title="Detail Project #{{ $project->id }}" subtitle="Informasi lengkap mengenai project"
                icon="project-diagram" :buttonLabel="auth()->user()->role === 'manager' ? 'Edit Project' : ''" :buttonRoute="auth()->user()->role === 'manager' ? 'leads.projects.edit' : ''" :buttonParams="['lead' => $lead, 'project' => $project]" buttonIcon="edit" />

            <!-- Content Section -->
            <div class="mt-6 max-w-6xl mx-auto">
                <!-- Project Card -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <!-- Project Status Banner -->
                    <div
                        class="px-4 py-3 border-b border-gray-200
                        {{ $project->status === 'waiting_approval' ? 'bg-yellow-50' : '' }}
                        {{ $project->status === 'approved' ? 'bg-green-50' : '' }}
                        {{ $project->status === 'rejected' ? 'bg-red-50' : '' }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $project->status === 'waiting_approval' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $project->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $project->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Dibuat pada {{ $project->created_at->format('d M Y H:i') }}
                                </span>
                            </div>
                            @if ($project->status === 'waiting_approval' && auth()->user()->role === 'manager')
                                <div class="flex items-center space-x-2">
                                    <form
                                        action="{{ route('leads.projects.approve', ['lead' => $lead, 'project' => $project]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                            <i class="fas fa-check mr-1.5"></i>
                                            Approve
                                        </button>
                                    </form>
                                    <form
                                        action="{{ route('leads.projects.reject', ['lead' => $lead, 'project' => $project]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                            <i class="fas fa-times mr-1.5"></i>
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="p-6">
                        <!-- Product Information -->
                        <div class="mb-8">
                            <h4 class="text-sm font-medium text-gray-500 mb-3">Informasi Produk</h4>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 bg-blue-500 rounded-lg">
                                            <i class="fas fa-box text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-900">{{ $project->product->name }}
                                        </h5>
                                        <p class="mt-1 text-sm text-gray-500">{{ $project->product->description }}</p>
                                        <div class="mt-2 flex items-center space-x-4">
                                            <span class="text-sm text-gray-500">
                                                <i class="fas fa-bolt mr-1"></i>
                                                {{ $project->product->speed }} Mbps
                                            </span>
                                            <span class="text-sm text-gray-500">
                                                <i class="fas fa-tag mr-1"></i>
                                                Rp {{ number_format($project->product->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- People Involved -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-3">People Involved</h4>
                            <div class="space-y-4">
                                <!-- Sales -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $project->sales->name }}
                                            </p>
                                            <p class="text-xs text-gray-500">Sales Representative</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Manager -->
                                @if ($project->manager)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 bg-gray-500 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-user-tie text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $project->manager->name }}</p>
                                                <p class="text-xs text-gray-500">Manager</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                        <a href="{{ route('leads.show', $lead) }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'projects.index', 'label' => 'Project Management'],
                ['label' => 'Detail Project #' . $project->id],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header :title="'Project #' . $project->id" :subtitle="'Detail informasi project untuk ' . $project->lead->name" icon="project-diagram" />

            <!-- Content Section -->
            <div class="mt-6 max-w-6xl mx-auto">
                <!-- Status Banner -->
                <div class="mb-6 bg-white rounded-lg shadow-sm overflow-hidden">
                    <div
                        class="px-4 py-5 sm:p-6
                        {{ $project->status === 'waiting_approval' ? 'bg-yellow-50' : '' }}
                        {{ $project->status === 'approved' ? 'bg-green-50' : '' }}
                        {{ $project->status === 'rejected' ? 'bg-red-50' : '' }}">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:items-center">
                                <div class="mt-3 sm:mt-0 sm:ml-4">
                                    <div class="text-sm font-medium text-gray-500">
                                        Status Project
                                    </div>
                                    <div class="mt-1 flex items-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $project->status === 'waiting_approval' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $project->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $project->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                        </span>
                                        <span class="ml-2 text-sm text-gray-500">
                                            Dibuat pada {{ $project->created_at->format('d M Y H:i') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if ($project->status === 'waiting_approval' && auth()->user()->role === 'manager')
                                <div class="mt-4 sm:mt-0 sm:ml-6 space-x-3">
                                    <form action="{{ route('projects.approve', $project) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                            <i class="fas fa-check mr-2"></i>
                                            Approve Project
                                        </button>
                                    </form>
                                    <form action="{{ route('projects.reject', $project) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                                            <i class="fas fa-times mr-2"></i>
                                            Reject Project
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Project Details -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <!-- Lead Information -->
                    <div class="px-4 py-5 sm:p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Lead</h3>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <div class="text-sm font-medium text-gray-500">Nama Lead</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $project->lead->name }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Perusahaan</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $project->lead->company }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Email</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $project->lead->email }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Telepon</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $project->lead->phone }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Information -->
                    <div class="px-4 py-5 sm:p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Detail Produk</h3>
                        <div class="mt-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-blue-600 text-lg"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-medium text-gray-900">{{ $project->product->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $project->product->description }}</p>
                                    <div class="mt-2 flex items-center space-x-4">
                                        <span class="inline-flex items-center text-sm text-gray-500">
                                            <i class="fas fa-bolt mr-1.5"></i>
                                            {{ $project->product->speed }} Mbps
                                        </span>
                                        <span class="inline-flex items-center text-sm text-gray-500">
                                            <i class="fas fa-tag mr-1.5"></i>
                                            Rp {{ number_format($project->product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- People Involved -->
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Tim Project</h3>
                        <div class="mt-4 space-y-4">
                            <!-- Sales -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $project->sales->name }}</p>
                                    <p class="text-xs text-gray-500">Sales Representative</p>
                                </div>
                            </div>

                            <!-- Manager -->
                            @if ($project->manager)
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-10 w-10 bg-gray-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user-tie text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $project->manager->name }}</p>
                                        <p class="text-xs text-gray-500">Manager</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6 flex justify-end">
                    <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

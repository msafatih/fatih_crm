<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'leads.index', 'label' => 'Lead Management'],
                ['label' => $lead->name],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header :title="$lead->name" subtitle="Detail informasi lead" icon="user" :buttonLabel="'Kembali'"
                :buttonRoute="'leads.index'" :buttonParams="['lead' => $lead]" buttonIcon="back" />

            <!-- Lead Information -->
            <div class="mt-6 bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Lead</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nama</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $lead->name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $lead->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Telepon</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $lead->phone }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Perusahaan</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $lead->company }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Status & Sales</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status Lead</dt>
                                    <dd class="mt-1">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $lead->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $lead->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $lead->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $lead->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                                        </span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Sales</dt>
                                    <dd class="mt-1 flex items-center space-x-3">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div
                                                class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $lead->sales->name }}</p>
                                            <p class="text-xs text-gray-500">Sales Representative</p>
                                        </div>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="mt-8">
                <div class="sm:flex sm:items-center sm:justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Daftar Project</h3>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <a href="{{ route('leads.projects.create', $lead) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                            <i class="fas fa-plus -ml-1 mr-2"></i>
                            Tambah Project
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg divide-y divide-gray-200">
                    @forelse($lead->projects as $project)
                        <div class="hover:bg-gray-50 transition-colors duration-150">
                            <div class="px-6 py-6">
                                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:justify-between">
                                    <!-- Left Section: Project Info -->
                                    <div class="flex items-start space-x-4">
                                        <!-- Project Icon with Status Indicator -->
                                        <div class="relative">
                                            <div
                                                class="absolute -inset-1 rounded-full blur-sm
                                {{ $project->status === 'waiting_approval' ? 'bg-yellow-400/30' : '' }}
                                {{ $project->status === 'approved' ? 'bg-green-400/30' : '' }}
                                {{ $project->status === 'rejected' ? 'bg-red-400/30' : '' }}">
                                            </div>
                                            <div
                                                class="relative rounded-full p-3
                                {{ $project->status === 'waiting_approval' ? 'bg-yellow-500' : '' }}
                                {{ $project->status === 'approved' ? 'bg-green-500' : '' }}
                                {{ $project->status === 'rejected' ? 'bg-red-500' : '' }}">
                                                <i class="fas fa-project-diagram text-white text-lg"></i>
                                            </div>
                                        </div>

                                        <!-- Project Details -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center space-x-3">
                                                <h4 class="text-base font-medium text-gray-900">Project
                                                    #{{ $project->id }}</h4>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $project->status === 'waiting_approval' ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : '' }}
                                    {{ $project->status === 'approved' ? 'bg-green-100 text-green-800 border border-green-200' : '' }}
                                    {{ $project->status === 'rejected' ? 'bg-red-100 text-red-800 border border-red-200' : '' }}">
                                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                                </span>
                                            </div>

                                            <!-- Product Info -->
                                            <div class="mt-2 flex flex-col space-y-1">
                                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                                    <i class="fas fa-box"></i>
                                                    <span class="font-medium">{{ $project->product->name }}</span>
                                                    <span class="text-gray-400">•</span>
                                                    <span>{{ $project->product->speed }} Mbps</span>
                                                </div>
                                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                                    <i class="fas fa-tag"></i>
                                                    <span>Rp
                                                        {{ number_format($project->product->price, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Section: Actions and Meta -->
                                    <div
                                        class="flex flex-col space-y-4 md:items-end md:space-y-0 md:space-x-6 md:flex-row">
                                        <!-- Meta Information -->
                                        <div class="flex flex-col items-start text-sm space-y-2">
                                            <div class="flex items-center space-x-2 text-gray-500">
                                                <i class="fas fa-clock"></i>
                                                <span>{{ $project->created_at->format('d M Y H:i') }}</span>
                                            </div>
                                            @if ($project->manager)
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="h-6 w-6 rounded-full bg-gray-500 flex items-center justify-center">
                                                            <i class="fas fa-user-tie text-white text-xs"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <span class="text-xs text-gray-500">Approved by</span>
                                                        <span
                                                            class="text-sm font-medium text-gray-900">{{ $project->manager->name }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex items-center space-x-2 border-l pl-6">
                                            <a href="{{ route('leads.projects.show', ['lead' => $lead, 'project' => $project]) }}"
                                                class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-blue-700 hover:text-blue-800 hover:bg-blue-50 transition-colors duration-150">
                                                <i class="fas fa-eye mr-1.5"></i>
                                                Detail
                                            </a>
                                            @if ($project->status === 'waiting_approval')
                                                <a href="{{ route('leads.projects.edit', ['lead' => $lead, 'project' => $project]) }}"
                                                    class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-800 hover:bg-gray-50 transition-colors duration-150">
                                                    <i class="fas fa-pencil-alt mr-1.5"></i>
                                                    Edit
                                                </a>
                                                <form
                                                    action="{{ route('leads.projects.destroy', ['lead' => $lead, 'project' => $project]) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-red-700 hover:text-red-800 hover:bg-red-50 transition-colors duration-150"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
                                                        <i class="fas fa-trash-alt mr-1.5"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-12">
                            <div class="flex flex-col items-center">
                                <div class="relative">
                                    <div class="absolute -inset-4 bg-blue-50/50 rounded-full blur-lg"></div>
                                    <i class="fas fa-folder-open text-gray-400 text-5xl relative"></i>
                                </div>
                                <h3 class="mt-4 text-sm font-medium text-gray-900">Belum ada project</h3>
                                <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat project baru untuk lead ini
                                </p>
                                <a href="{{ route('leads.projects.create', $lead) }}"
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors duration-150">
                                    <i class="fas fa-plus mr-2"></i>
                                    Buat Project Pertama
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                ['label' => 'Edit Proyek'],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header title="Edit Project" subtitle="Ubah informasi project yang sudah ada"
                icon="project-diagram" />

            <!-- Form Section -->
            <div class="mt-6 max-w-6xl mx-auto">
                <form action="{{ route('leads.projects.update', ['lead' => $lead, 'project' => $project]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white shadow rounded-lg">
                        <!-- Lead Info -->
                        <div class="p-6 border-b border-gray-200">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Informasi Lead</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <span class="text-sm text-gray-500">Nama Lead:</span>
                                        <p class="text-sm font-medium text-gray-900">{{ $lead->name }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-500">Perusahaan:</span>
                                        <p class="text-sm font-medium text-gray-900">{{ $lead->company }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="p-6">
                            <div class="mb-4">
                                <label for="product_id" class="block text-sm font-medium text-gray-700">
                                    Pilih Produk <span class="text-red-500">*</span>
                                </label>
                                <select id="product_id" name="product_id"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm"
                                    required>
                                    <option value="">Pilih produk...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ $project->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            @if (auth()->user()->role === 'manager')
                                <div class="mt-6">
                                    <label for="status" class="block text-sm font-medium text-gray-700">
                                        Status Project <span class="text-red-500">*</span>
                                    </label>
                                    <select id="status" name="status"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                                        <option value="waiting_approval"
                                            {{ $project->status === 'waiting_approval' ? 'selected' : '' }}>
                                            Menunggu Persetujuan
                                        </option>
                                        <option value="approved"
                                            {{ $project->status === 'approved' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="rejected"
                                            {{ $project->status === 'rejected' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('status') }}</p>
                                    @enderror
                                </div>
                            @endif

                            <!-- Hidden Fields -->
                            <input type="hidden" name="sales_id" value="{{ $lead->sales_id }}">
                            <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                        </div>

                        <!-- Form Actions -->
                        <div class="px-6 py-4 bg-gray-50 flex items-center justify-end space-x-3 rounded-b-lg">
                            <a href="{{ route('leads.show', $lead) }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Kembali
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Project
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

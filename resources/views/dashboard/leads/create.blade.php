<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'leads.index', 'label' => 'Lead Management'],
                ['label' => 'Tambah Lead'],
            ]" />

            <!-- Header Section -->
            <!-- Header Section -->
            <x-dashboard.header title="Tambah Lead Baru"
                subtitle="Silakan isi formulir untuk menambahkan data lead baru ke dalam sistem" icon="user-plus" />

            <!-- Form Section -->
            <x-dashboard.form.container action="{{ route('leads.store') }}">
                <x-dashboard.form.section title="Informasi Lead" icon="info-circle">
                    <x-dashboard.form.row>
                        <x-dashboard.form.input name="name" label="Nama Lengkap" icon="user" required="true"
                            placeholder="Masukkan nama lengkap" />

                        <x-dashboard.form.input name="email" label="Email Address" type="email" icon="envelope"
                            required="true" placeholder="contoh@email.com" />
                    </x-dashboard.form.row>

                    <x-dashboard.form.row>
                        <x-dashboard.form.input name="phone" label="Nomor Telepon" icon="phone" required="true"
                            placeholder="081234567890" />

                        <x-dashboard.form.input name="company" label="Perusahaan" icon="building" required="true"
                            placeholder="Nama perusahaan" />
                    </x-dashboard.form.row>

                    <x-dashboard.form.row>
                        <x-dashboard.form.select name="status" label="Status" icon="flag" required="true">
                            <option value="" disabled selected>Pilih status</option>
                            <option value="new">Baru</option>
                            <option value="in_progress">Dalam Proses</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </x-dashboard.form.select>

                        <div class="col-span-1 mt-3">
                            <label class="block text-sm font-medium text-gray-700">
                                Sales Penanggung Jawab
                            </label>
                            <div class="mt-1 flex items-center p-2.5 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-2">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ auth()->user()->name }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Sales Representative
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="sales_id" value="{{ auth()->id() }}" />
                        </div>
                    </x-dashboard.form.row>
                </x-dashboard.form.section>

                <x-dashboard.form.actions backRoute="leads.index" submitLabel="Simpan Lead" />
            </x-dashboard.form.container>
        </div>
    </div>
</x-app-layout>

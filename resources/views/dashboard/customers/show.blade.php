<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-dashboard.breadcrumb :items="[
                ['icon' => 'home', 'route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'customers.index', 'label' => 'Customer Management'],
                ['label' => $customer->lead->name],
            ]" />

            <!-- Header Section -->
            <x-dashboard.header :title="$customer->lead->name" :subtitle="$customer->lead->company" icon="user-check" />

            <!-- Content Section -->
            <div class="mt-6 max-w-4xl mx-auto space-y-6">
                <!-- Customer Information Card -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Customer</h3>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <div class="text-sm font-medium text-gray-500">Email</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $customer->lead->email }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Telepon</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $customer->lead->phone }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Sales Representative</div>
                                <div class="mt-1 flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900">{{ $customer->lead->sales->name }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500">Customer Sejak</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $customer->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Subscriptions -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Subscription Aktif</h3>
                        <div class="mt-4 space-y-4">
                            @forelse($customer->subscriptions->where('status', 'active') as $subscription)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-box text-blue-600"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <h4 class="text-sm font-medium text-gray-900">
                                                    {{ $subscription->product->name }}</h4>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </div>
                                            <div class="mt-1 grid grid-cols-1 gap-2 sm:grid-cols-3">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <i class="fas fa-bolt mr-1.5"></i>
                                                    {{ $subscription->product->speed }} Mbps
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <i class="fas fa-tag mr-1.5"></i>
                                                    Rp {{ number_format($subscription->product->price, 0, ',', '.') }}
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <i class="fas fa-calendar mr-1.5"></i>
                                                    Berakhir:
                                                    {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <p class="text-sm text-gray-500">Tidak ada subscription aktif</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Subscription History -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Riwayat Subscription</h3>
                        <div class="mt-4">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Product</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Mulai</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Berakhir</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($customer->subscriptions as $subscription)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $subscription->product->name }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $subscription->product->speed }} Mbps</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                        {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                        {{ ucfirst($subscription->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                                    Tidak ada riwayat subscription
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="flex justify-end">
                    <a href="{{ route('customers.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Customer
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

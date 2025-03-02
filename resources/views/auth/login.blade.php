<x-auth-layout title="Login Page">
    <!-- Left Side - Branding and Info Section -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-800 to-indigo-900 relative overflow-hidden"
        id="loginSection">
        <div class="absolute -left-20 -top-20 w-64 h-64 rounded-full bg-blue-600 opacity-20 blur-xl"></div>
        <div class="absolute right-10 bottom-40 w-80 h-80 rounded-full bg-indigo-500 opacity-20 blur-xl"></div>
        <div class="absolute left-40 bottom-0 w-40 h-40 rounded-full bg-blue-400 opacity-20 blur-xl"></div>

        <div class="m-auto text-white px-8 sm:px-12 md:px-16 lg:px-20 relative z-10">
            <div class="space-y-10">
                <!-- Logo Section -->
                <div class="text-center py-8 fade-in">
                    <!-- Logo icon could be added here -->
                    <svg class="mx-auto h-16 w-16 mb-3" viewBox="0 0 48 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 4L4 14V34L24 44L44 34V14L24 4Z" fill="#3B82F6" />
                        <path d="M24 24L4 14M24 24L44 14M24 24V44" stroke="white" stroke-width="2" />
                    </svg>
                    <h1 class="text-4xl font-extrabold tracking-tight fade-in mt-2" id="title">PT SMART</h1>
                    <p class="text-lg text-blue-100 fade-in mt-2">Your Reliable Internet Service Provider</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <x-feature-box id="box1" icon="wifi" title="Fast Connection"
                        description="High-speed internet solutions for your business needs" />

                    <x-feature-box id="box2" icon="shield-alt" title="Reliable Service"
                        description="24/7 network monitoring and support" />

                    <x-feature-box id="box3" icon="chart-line" title="Smart Solutions"
                        description="Innovative digital transformation services" />
                </div>

                <div class="grid grid-cols-3 gap-6 mt-12 text-center">
                    <x-stat-item value="500+" label="Active Customers" />

                    <x-stat-item value="99.9%" label="Uptime" />

                    <x-stat-item value="24/7" label="Support" />
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gray-50">
        <div class="w-full max-w-md">
            <div
                class="bg-white rounded-2xl shadow-xl p-8 transform transition-all hover:scale-[1.01] duration-300 border-t-4 border-blue-600">
                <x-auth-header icon="key" title="Welcome to PT SMART" subtitle="Please sign in to continue" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <x-form.input type="text" name="email" id="email" label="Email/Username" icon="envelope"
                        placeholder="Enter your email or username" :value="old('email')" required autofocus />

                    <x-form.input type="password" name="password" id="password" label="Password" icon="key"
                        placeholder="Enter your password" required />

                    <x-form.remember-forgot />

                    <x-form.submit-button text="Sign in to Dashboard" icon="sign-in-alt" />

                    <!-- Social Login Options -->
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-3 gap-3">
                            <button type="button"
                                class="inline-flex justify-center items-center py-2 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all hover:border-blue-500">
                                <i class="fab fa-google text-lg"></i>
                            </button>
                            <button type="button"
                                class="inline-flex justify-center items-center py-2 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all hover:border-blue-500">
                                <i class="fab fa-microsoft text-lg"></i>
                            </button>
                            <button type="button"
                                class="inline-flex justify-center items-center py-2 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all hover:border-blue-500">
                                <i class="fab fa-apple text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            New to PT SMART?
                            <a href="{{ route('register') }}"
                                class="font-medium text-blue-600 hover:text-blue-700 hover:underline transition-all">
                                Create an account
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Help Section -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Need assistance?</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <a href="#"
                            class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all hover:border-blue-500 group">
                            <i class="fas fa-headset mr-2 text-blue-500 group-hover:text-blue-600"></i>
                            Support Center
                        </a>
                        <a href="#"
                            class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all hover:border-blue-500 group">
                            <i class="fas fa-book-open mr-2 text-blue-500 group-hover:text-blue-600"></i>
                            User Guide
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-sm text-gray-600">
                    &copy; {{ date('Y') }} PT SMART. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-auth-layout>

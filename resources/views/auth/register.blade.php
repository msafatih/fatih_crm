<x-auth-layout title="Register Page">
    <!-- Left Side - Branding and Info Section -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-800 to-indigo-900 relative overflow-hidden"
        id="registerSection">
        <div class="absolute -left-20 -top-20 w-64 h-64 rounded-full bg-blue-600 opacity-20 blur-xl"></div>
        <div class="absolute right-10 bottom-40 w-80 h-80 rounded-full bg-indigo-500 opacity-20 blur-xl"></div>
        <div class="absolute left-40 bottom-0 w-40 h-40 rounded-full bg-blue-400 opacity-20 blur-xl"></div>

        <div class="m-auto text-white px-8 sm:px-12 md:px-16 lg:px-20 relative z-10">
            <div class="space-y-10">
                <!-- Logo Section -->
                <div class="text-center py-8 fade-in">
                    <svg class="mx-auto h-16 w-16 mb-3" viewBox="0 0 48 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 4L4 14V34L24 44L44 34V14L24 4Z" fill="#3B82F6" />
                        <path d="M24 24L4 14M24 24L44 14M24 24V44" stroke="white" stroke-width="2" />
                    </svg>
                    <h1 class="text-4xl font-extrabold tracking-tight fade-in mt-2" id="title">Join PT SMART</h1>
                    <p class="text-lg text-blue-100 fade-in mt-2">Create your account today</p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <x-feature-box id="box1" icon="rocket" title="Quick Setup"
                        description="Get started with our services in minutes" />

                    <x-feature-box id="box2" icon="users" title="24/7 Support"
                        description="Our team is here to help you succeed" />

                    <x-feature-box id="box3" icon="shield-alt" title="Secure Platform"
                        description="Your data is protected with enterprise-grade security" />
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-3 gap-6 mt-12 text-center">
                    <x-stat-item value="5min" label="Setup Time" />
                    <x-stat-item value="100%" label="Satisfaction" />
                    <x-stat-item value="24/7" label="Support" />
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gray-50">
        <div class="w-full max-w-md">
            <div
                class="bg-white rounded-2xl shadow-xl p-8 transform transition-all hover:scale-[1.01] duration-300 border-t-4 border-blue-600">
                <x-auth-header icon="user-plus" title="Create Account" subtitle="Join PT SMART network today" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Input -->
                    <x-form.input type="text" name="name" id="name" label="Full Name" icon="user"
                        placeholder="Enter your full name" :value="old('name')" required autofocus />

                    <!-- Email Input -->
                    <x-form.input type="email" name="email" id="email" label="Email Address" icon="envelope"
                        placeholder="Enter your email address" :value="old('email')" required />

                    <!-- Password Input -->
                    <x-form.input type="password" name="password" id="password" label="Password" icon="lock"
                        placeholder="Create a strong password" required />

                    <!-- Confirm Password Input -->
                    <x-form.input type="password" name="password_confirmation" id="password_confirmation"
                        label="Confirm Password" icon="lock" placeholder="Confirm your password" required />

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="terms" id="terms" required
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3">
                            <label for="terms" class="text-sm text-gray-600">
                                I agree to the
                                <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline">Terms of
                                    Service</a>
                                and
                                <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline">Privacy
                                    Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <x-form.submit-button text="Create Account" icon="user-plus" />

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}"
                                class="font-medium text-blue-600 hover:text-blue-700 hover:underline transition-all">
                                Sign in
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

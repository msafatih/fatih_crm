@props([
    'icon' => 'user-circle',
    'title' => 'Welcome Back!',
    'subtitle' => 'Access your PT SMART dashboard',
])

<div class="text-center mb-8">
    <div class="inline-flex items-center justify-center bg-blue-100 p-4 rounded-full mb-4">
        <i class="fas fa-{{ $icon }} text-3xl text-blue-600"></i>
    </div>
    <h2 class="text-3xl font-bold text-gray-800 fade-in">{{ $title }}</h2>
    <p class="text-gray-500 mt-2 fade-in">{{ $subtitle }}</p>
</div>

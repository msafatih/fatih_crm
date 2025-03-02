@props(['icon', 'title', 'description', 'id'])

<div class="bg-white bg-opacity-10 p-6 rounded-2xl backdrop-blur-sm icon-box fade-in hover:bg-opacity-20 transition-all duration-300 border border-white border-opacity-10"
    id="{{ $id }}">
    <div class="bg-blue-500 bg-opacity-20 p-3 rounded-xl inline-block mb-3">
        <i class="fas fa-{{ $icon }} text-2xl text-blue-100"></i>
    </div>
    <h3 class="text-lg font-semibold mt-2">{{ $title }}</h3>
    <p class="mt-2 text-sm text-blue-100">{{ $description }}</p>
</div>

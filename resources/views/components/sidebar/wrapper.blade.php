<div x-data="{ isSidebarOpen: false }">
    <button @click="isSidebarOpen = !isSidebarOpen" aria-label="Toggle navigation menu"
        class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-blue-600 text-white">
        <i class="fas" :class="isSidebarOpen ? 'fa-times' : 'fa-bars'"></i>
    </button>

    <aside
        class="fixed top-0 left-0 z-40 transition-all duration-300 transform lg:translate-x-0 h-screen bg-white/80
        backdrop-blur-xl border-r border-gray-100 shadow-lg w-64 lg:w-64 sm:w-20 xs:w-16 flex flex-col"
        :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <x-sidebar.profile />
        <x-sidebar.navigation />
        <x-sidebar.logout />
    </aside>
</div>

<style>
    @media (max-width: 640px) {
        .xs\:w-16 {
            width: 4rem;
        }
    }

    /* Custom Scrollbar Styling */
    .scrollbar-thin {
        scrollbar-width: thin;
    }

    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background-color: rgb(209 213 219);
        /* gray-300 */
        border-radius: 20px;
    }

    .scrollbar-thin:hover::-webkit-scrollbar-thumb {
        background-color: rgb(156 163 175);
        /* gray-400 */
    }
</style>

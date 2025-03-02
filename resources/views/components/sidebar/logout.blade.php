<div class="flex-shrink-0 px-4 lg:px-6 py-4 lg:py-6 border-t border-gray-100 bg-white/80 backdrop-blur-sm">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="group flex items-center justify-center w-full px-3 lg:px-4 py-2.5 lg:py-3.5 text-sm font-semibold text-white
                bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-xl 
                transition-all duration-300 
                hover:shadow-lg hover:shadow-blue-500/30 hover:scale-[1.02]
                focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                active:scale-95">
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            <span class="ml-2 tracking-wider hidden sm:inline-block">Sign Out</span>
        </button>
    </form>
</div>

<div class="space-y-1.5 mt-3">
    <label for="{{ $name }}" class="flex items-center text-sm font-medium text-gray-700 group">
        {{ $label }}
        @if ($required)
            <span class="text-red-500 ml-1 group-hover:animate-pulse">*</span>
        @endif
    </label>
    <div class="relative">
        @if ($icon)
            <div
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-opacity duration-200">
                <i class="fas fa-{{ $icon }} text-gray-400 group-hover:text-blue-500"></i>
            </div>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" @if ($min !== null) min="{{ $min }}" @endif
            @if ($max !== null) max="{{ $max }}" @endif
            @if ($required) required @endif
            class="block w-full rounded-lg border-gray-300 {{ $icon ? 'pl-10' : 'pl-4' }} pr-4 py-2.5
                   focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                   hover:border-gray-400 
                   transition-all duration-200
                   placeholder-gray-400
                   bg-white
                   shadow-sm
                   disabled:bg-gray-50 disabled:text-gray-500 disabled:border-gray-200 disabled:cursor-not-allowed"
            placeholder="{{ $placeholder }}">

        @if ($type === 'password')
            <button type="button"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                onclick="togglePasswordVisibility('{{ $name }}')">
                <i class="fas fa-eye"></i>
            </button>
        @endif
    </div>
    @error($name)
        <div class="flex items-center space-x-2 text-red-600 text-sm animate-fade-in">
            <i class="fas fa-exclamation-circle"></i>
            <p>{{ $message }}</p>
        </div>
    @enderror
</div>

@once
    @push('scripts')
        <script>
            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                const button = input.nextElementSibling.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    button.classList.remove('fa-eye');
                    button.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    button.classList.remove('fa-eye-slash');
                    button.classList.add('fa-eye');
                }
            }
        </script>
    @endpush
@endonce

<div class="flex items-center justify-between">
    <div class="flex items-center">
        <input type="checkbox" name="remember" id="remember"
            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <label for="remember" class="ml-2 block text-sm text-gray-700">
            Remember me
        </label>
    </div>
    <a href="{{ route('password.request') }}"
        class="text-sm text-blue-600 hover:text-blue-700 hover:underline transition-all font-medium">
        Forgot password?
    </a>
</div>

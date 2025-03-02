<div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-200 hover:shadow-2xl">
    <form action="{{ $action }}" method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}" {{ $attributes }}>
        @csrf
        @if (strtoupper($method) !== 'GET' && strtoupper($method) !== 'POST')
            @method($method)
        @endif
        <div class="p-8 space-y-8">
            {{ $slot }}
        </div>
    </form>
</div>

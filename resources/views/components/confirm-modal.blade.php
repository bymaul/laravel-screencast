<div
    {{ $attributes->merge(['class' => 'absolute inset-0 w-full h-full bg-black/50 flex justify-center items-center']) }}>
    <div class="bg-white md:max-w-xl w-full rounded-lg shadow-lg text-base text-black overflow-hidden">
        <div class="px-6 py-4 border-b flex items-center justify-between bg-gray-50">
            <div>{{ $title }}</div>
            <button @click="{{ $state }} = false">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>

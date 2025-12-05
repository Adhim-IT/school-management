<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form wire:submit.prevent="login" class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-3">
                {{ session('error') }}
            </div>
        @endif

        <label class="block mb-2">Email</label>
        <input type="email" wire:model="email" class="w-full p-2 border rounded mb-1">
        @error('email')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">Password</label>
        <input type="password" wire:model="password" class="w-full p-2 border rounded mb-1">
        @error('password')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

        <button class="w-full p-2 bg-blue-600 text-white rounded hover:bg-blue-700 mt-2">
            Login
        </button>

        <p class="text-center mt-3 text-sm">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600">Register</a>
        </p>
    </form>
</div>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form wire:submit.prevent="register" class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

        <label class="block mb-2">Nama</label>
        <input type="text" wire:model="name" class="w-full p-2 border rounded mb-1">
        @error('name')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

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

        <label class="block mb-2">Konfirmasi Password</label>
        <input type="password" wire:model="password_confirmation" class="w-full p-2 border rounded mb-1">
        @error('password_confirmation')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

        <button class="w-full p-2 bg-green-600 text-white rounded hover:bg-green-700 mt-2">
            Register
        </button>

        <p class="text-center mt-3 text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600">Login</a>
        </p>
    </form>
</div>

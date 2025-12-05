<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Kelas</h2>

    @if (session('success'))
        <div class="bg-green-600 text-white p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">

        <div>
            <label class="font-semibold">Nama Kelas</label>
            <input wire:model="nama_kelas" type="text" class="w-full p-2 border rounded">
            @error('nama_kelas') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="font-semibold">Tingkat</label>
            <input wire:model="tingkat" type="number" class="w-full p-2 border rounded">
            @error('tingkat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="font-semibold">Tahun Ajaran</label>
            <input wire:model="tahun_ajaran" type="text" class="w-full p-2 border rounded" placeholder="2024/2025">
            @error('tahun_ajaran') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('kelas.index') }}" class="px-4 py-2 bg-gray-400 rounded text-white hover:bg-gray-500">
                Kembali
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-3xl font-bold mb-6 text-gray-800">Tambah Kelas</h2>

        <form wire:submit.prevent="save" class="space-y-5">
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nama Kelas</label>
                <input 
                    wire:model="nama_kelas" 
                    type="text" 
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: X IPA 1"
                >
                @error('nama_kelas') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Tingkat</label>
                <input 
                    wire:model="tingkat" 
                    type="number"
                    min="1" max="12"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: 10"
                >
                @error('tingkat') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Tahun Ajaran</label>
                <input 
                    wire:model="tahun_ajaran" 
                    type="text" 
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: 2024/2025"
                >
                @error('tahun_ajaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button 
                class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
    </div>
</div>

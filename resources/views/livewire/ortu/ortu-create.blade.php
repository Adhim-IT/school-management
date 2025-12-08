<div class="max-w-xl mx-auto py-8">
    <div class="bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-3xl font-bold mb-6 text-gray-800">Tambah Orang Tua</h2>

        <form wire:submit.prevent="save" class="space-y-5">
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nama Orang Tua</label>
                <input 
                    wire:model="nama_ortu" 
                    type="text" 
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Budiman Santoso & Krisdayanti Anwar"
                >
                <p class="text-gray-500 text-xs mt-1">Format: Nama Ayah & Nama Ibu</p>
                @error('nama_ortu') 
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
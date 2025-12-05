<div class="w-96 mx-auto p-6 bg-white shadow rounded">

    <h2 class="text-2xl font-bold mb-4">Tambah Siswa</h2>

    <form wire:submit.prevent="update" class="space-y-3">
        <div>
            <label>NIS</label>
            <input type="text" wire:model="nis" class="w-full p-2 border rounded">
            @error('nis') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama</label>
            <input type="text" wire:model="nama" class="w-full p-2 border rounded">
            @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Kelas</label>
            <select wire:model="kelas_id" class="w-full p-2 border rounded">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Jenis Kelamin</label>
            <select wire:model="jenis_kelamin" class="w-full p-2 border rounded">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Alamat</label>
            <textarea wire:model="alamat" class="w-full p-2 border rounded"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Simpan</button>
    </form>
</div>

<div class="p-6 space-y-4">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h2 class="text-2xl font-bold">Daftar Siswa</h2>

        <div class="flex items-center gap-3">
            <a href="/dashboard" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Kembali
            </a>

            <a href="{{ route('siswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Siswa
            </a>
        </div>
    </div>

    <input type="text" wire:model.live="search" placeholder="Cari Siswa..." class="w-full md:w-64 p-2 border rounded">

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
            x-transition.opacity.duration.500ms class="bg-green-500 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-white shadow rounded overflow-hidden">
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="p-3">Nama</th>
                        <th class="p-3">Kelas</th>
                        <th class="p-3">Kelamin</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $s)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $s->nama }}</td>
                            <td class="p-3">{{ $s->kelas->nama_kelas }}</td>
                            <td class="p-3">{{ $s->jenis_kelamin }}</td>
                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <button wire:click="showDetail({{ $s->id }})"
                                        class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">
                                        Detail
                                    </button>
                                    <a href="{{ route('siswa.edit', $s->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>
                                    <button
                                        onclick="if(confirm('Yakin ingin menghapus siswa ini?')) { Livewire.dispatch('delete', { id: {{ $s->id }} }) }"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Tidak ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="md:hidden divide-y">
            @forelse ($siswa as $s)
                <div class="p-4 space-y-3">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $s->nama }}</h3>
                            <p class="text-sm text-gray-600">{{ $s->kelas->nama_kelas }}</p>
                            <p class="text-sm text-gray-600">{{ $s->jenis_kelamin }}</p>
                        </div>
                    </div>

                    <div class="flex gap-2 pt-2">
                        <button wire:click="showDetail({{ $s->id }})"
                            class="flex-1 px-3 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm font-medium">
                            Detail
                        </button>
                        <a href="{{ route('siswa.edit', $s->id) }}"
                            class="flex-1 px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-center text-sm font-medium">
                            Edit
                        </a>
                        <button
                            onclick="if(confirm('Yakin ingin menghapus siswa ini?')) { Livewire.dispatch('delete', { id: {{ $s->id }} }) }"
                            class="flex-1 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm font-medium">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    Tidak ada data siswa.
                </div>
            @endforelse
        </div>
    </div>
    {{ $siswa->links('vendor.pagination.custom') }}
    @if ($detailItem)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded shadow-lg w-[90%] md:w-1/3 p-4 space-y-3">
                <h3 class="text-xl font-bold mb-2">Detail Siswa</h3>

                <p><b>NIS:</b> {{ $detailItem->nis }}</p>
                <p><b>Nama:</b> {{ $detailItem->nama }}</p>
                <p><b>Kelas:</b> {{ $detailItem->kelas->nama_kelas }}</p>
                <p><b>Jenis Kelamin:</b> {{ $detailItem->jenis_kelamin }}</p>

                <button wire:click="closeDetail" class="w-full mt-3 px-4 py-2 bg-gray-700 text-white rounded">
                    Tutup
                </button>
            </div>
        </div>
    @endif

</div>
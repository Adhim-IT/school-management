<div class="p-6 space-y-4">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h2 class="text-2xl font-bold">Daftar Guru</h2>

        <div class="flex items-center gap-3">
            <a href="/dashboard" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Kembali
            </a>

            <a href="{{ route('guru.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Guru
            </a>
        </div>
    </div>

    <input type="text" wire:model.live="search" placeholder="Cari guru..." class="w-full md:w-64 p-2 border rounded">

    @if ($showAlert)
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => { show = false; @this.set('showAlert', false) }, 3000)" 
            x-show="show"
            x-transition.opacity.duration.500ms 
            class="bg-green-500 text-white px-4 py-2 rounded">
            {{ $alertMessage }}
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
                    @forelse ($gurus as $g)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $g->nama }}</td>
                            <td class="p-3">{{ $g->kelas->nama_kelas ?? '-' }}</td>
                            <td class="p-3">{{ $g->jenis_kelamin }}</td>
                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <button wire:click="showDetail({{ $g->id }})"
                                        class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">
                                        Detail
                                    </button>
                                    <a href="{{ route('guru.edit', $g->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>
                                    <button
                                        onclick="if(confirm('Yakin ingin menghapus guru ini?')) { Livewire.dispatch('delete', { id: {{ $g->id }} }) }"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Tidak ada data guru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y">
            @forelse ($gurus as $g)
                <div class="p-4 space-y-3">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $g->nama }}</h3>
                            <p class="text-sm text-gray-600">{{ $g->kelas->nama_kelas ?? '-' }}</p>
                            <p class="text-sm text-gray-600">{{ $g->jenis_kelamin }}</p>
                        </div>
                    </div>

                    <div class="flex gap-2 pt-2">
                        <button wire:click="showDetail({{ $g->id }})"
                            class="flex-1 px-3 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm font-medium">
                            Detail
                        </button>
                        <a href="{{ route('guru.edit', $g->id) }}"
                            class="flex-1 px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-center text-sm font-medium">
                            Edit
                        </a>
                        <button
                            onclick="if(confirm('Yakin ingin menghapus guru ini?')) { Livewire.dispatch('delete', { id: {{ $g->id }} }) }"
                            class="flex-1 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm font-medium">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    Tidak ada data guru.
                </div>
            @endforelse
        </div>
    </div>

    {{ $gurus->links('vendor.pagination.custom') }}

    @if ($detailItem)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 space-y-4">
                <h3 class="text-xl font-bold border-b pb-2">Detail Guru</h3>

                <div class="space-y-3">
                    <div class="flex">
                        <span class="font-semibold w-32">NIP:</span>
                        <span>{{ $detailItem->nip }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-semibold w-32">Nama:</span>
                        <span>{{ $detailItem->nama }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-semibold w-32">Kelas:</span>
                        <span>{{ $detailItem->kelas->nama_kelas ?? '-' }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-semibold w-32">Mapel:</span>
                        <span>{{ $detailItem->mata_pelajaran }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-semibold w-32">Jenis Kelamin:</span>
                        <span>{{ $detailItem->jenis_kelamin }}</span>
                    </div>
                </div>

                <button wire:click="closeDetail"
                    class="w-full mt-4 px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 font-medium">
                    Tutup
                </button>
            </div>
        </div>
    @endif

</div>
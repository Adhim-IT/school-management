<div class="p-6 space-y-4">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h2 class="text-2xl font-bold">Daftar Kelas</h2>

        <div class="flex items-center gap-3">
            <a href="/dashboard" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Kembali
            </a>

            <a href="{{ route('kelas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Kelas
            </a>
        </div>
    </div>

    <input type="text" wire:model.live="search" placeholder="Cari kelas..." class="w-full md:w-64 p-2 border rounded">

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
                        <th class="p-3">Nama Kelas</th>
                        <th class="p-3">Tingkat</th>
                        <th class="p-3">Tahun Ajaran</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $k)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $k->nama_kelas }}</td>
                            <td class="p-3">{{ $k->tingkat }}</td>
                            <td class="p-3">{{ $k->tahun_ajaran }}</td>
                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('kelas.edit', $k->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>
                                    <button
                                        onclick="if(confirm('Yakin ingin menghapus kelas ini?')) { Livewire.dispatch('delete', { id: {{ $k->id }} }) }"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Tidak ada data kelas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y">
            @forelse ($kelas as $k)
                <div class="p-4 space-y-3">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $k->nama_kelas }}</h3>
                        <p class="text-sm text-gray-600">Tingkat: {{ $k->tingkat }}</p>
                        <p class="text-sm text-gray-600">Tahun Ajaran: {{ $k->tahun_ajaran }}</p>
                    </div>

                    <div class="flex gap-2 pt-2">
                        <a href="{{ route('kelas.edit', $k->id) }}"
                            class="flex-1 px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-center text-sm font-medium">
                            Edit
                        </a>
                        <button
                            onclick="if(confirm('Yakin ingin menghapus kelas ini?')) { Livewire.dispatch('delete', { id: {{ $k->id }} }) }"
                            class="flex-1 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm font-medium">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    Tidak ada data kelas.
                </div>
            @endforelse
        </div>
    </div>

    {{ $kelas->links('vendor.pagination.custom') }}

</div>
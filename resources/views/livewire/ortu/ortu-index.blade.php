<div class="p-6 space-y-4">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <h2 class="text-2xl font-bold">Daftar ortu</h2>

        <div class="flex items-center gap-3">
            <a href="/dashboard" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Kembali
            </a>

            <a href="{{ route('ortu.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah ortu
            </a>
        </div>
    </div>

    <input type="text" wire:model.live="search" placeholder="Cari ortu..." class="w-full md:w-64 p-2 border rounded">

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
                        <th class="p-3">Nama ortu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ortu as $o)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $o->nama_ortu }}</td>
                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('ortu.edit', $o->id) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>
                                    <button
                                        onclick="if(confirm('Yakin ingin menghapus ortu ini?')) { Livewire.dispatch('delete', { id: {{ $o->id }} }) }"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Tidak ada data ortu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y">
            @forelse ($ortu as $o)
                <div class="p-4 space-y-3">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $o->nama_ortu }}</h3>
                    </div>

                    <div class="flex gap-2 pt-2">
                        <a href="{{ route('ortu.edit', $o->id) }}"
                            class="flex-1 px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-center text-sm font-medium">
                            Edit
                        </a>
                        <button
                            onclick="if(confirm('Yakin ingin menghapus ortu ini?')) { Livewire.dispatch('delete', { id: {{ $o->id }} }) }"
                            class="flex-1 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm font-medium">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    Tidak ada data ortu.
                </div>
            @endforelse
        </div>
    </div>

    {{ $ortu->links('vendor.pagination.custom') }}

</div>
<div class="p-6 space-y-4">
    <a href="/dashboard"
       class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
        ← Kembali
    </a>
    
    <h2 class="text-2xl font-bold mb-4">Laporan Siswa per Kelas</h2>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Kelas</th>
                <th class="p-2 border">Daftar Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
                <tr class="border">
                    <td class="p-2 border font-semibold">{{ $k->nama_kelas }}</td>
                    <td class="p-2 border">
                        @forelse ($k->siswa as $s)
                            <div>• {{ $s->nama }}</div>
                        @empty
                            <span class="text-gray-500">Tidak ada siswa</span>
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

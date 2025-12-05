<?php

namespace App\Livewire\Laporan;

use App\Models\Kelas;
use Livewire\Component;

class SiswaPerKelas extends Component
{
    public function render()
    {
        return view('livewire.laporan.siswa-per-kelas', [
            'kelas' =>Kelas::with('siswa')->get()
        ]);
    }
}

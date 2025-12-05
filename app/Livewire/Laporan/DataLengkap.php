<?php

namespace App\Livewire\Laporan;

use App\Models\Kelas;
use Livewire\Component;

class DataLengkap extends Component
{
    public function render()
    {
        return view('livewire.laporan.data-lengkap',[
            'kelas' => Kelas::with(['siswa', 'guru'])->get()
        ]);
    }
}

<?php

namespace App\Livewire\Laporan;

use App\Models\Kelas;
use Livewire\Component;

class GuruPerKelas extends Component
{
    public function render()
    {
        return view('livewire.laporan.guru-per-kelas' , [
            'kelas' => Kelas::with('guru')->get()
        ]);
    }
}

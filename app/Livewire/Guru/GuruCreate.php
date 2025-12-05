<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruCreate extends Component
{
    public $nip, $nama, $kelas_id, $mata_pelajaran, $jenis_kelamin;

    public function save()
    {
        $this->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama' => 'required',
            'kelas_id' => 'nullable|exists:kelas,id',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        Guru::create([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'kelas_id' => $this->kelas_id,
            'mata_pelajaran' => $this->mata_pelajaran,
            'jenis_kelamin' => $this->jenis_kelamin,
        ]);

       session()->flash('success', 'Kelas guru ditambahkan!');
        return redirect()->route('guru.index');
    
    }

    public function render()
    {
        return view('livewire.guru.guru-create', [
            'kelas' => Kelas::all()
        ]);
    }
}

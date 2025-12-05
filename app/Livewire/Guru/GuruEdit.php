<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruEdit extends Component
{
    public $guru_id, $nip, $nama, $kelas_id, $mata_pelajaran, $jenis_kelamin;

    public function mount($id)
    {
        $g = Guru::findOrFail($id);

        $this->guru_id = $g->id;
        $this->nip = $g->nip;
        $this->nama = $g->nama;
        $this->kelas_id = $g->kelas_id;
        $this->mata_pelajaran = $g->mata_pelajaran;
        $this->jenis_kelamin = $g->jenis_kelamin;
    }

    public function update()
    {
        $this->validate([
            'nip' => 'required|unique:gurus,nip,' . $this->guru_id,
            'nama' => 'required',
            'kelas_id' => 'nullable|exists:kelas,id',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Guru::find($this->guru_id)->update([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'kelas_id' => $this->kelas_id,
            'mata_pelajaran' => $this->mata_pelajaran,
            'jenis_kelamin' => $this->jenis_kelamin,
        ]);

        session()->flash('success', 'Data guru berhasil diperbarui!');
        return redirect()->route('guru.index');
    }

    public function render()
    {
        return view('livewire.guru.guru-edit', [
            'kelas' => Kelas::all()
        ]);
    }
}

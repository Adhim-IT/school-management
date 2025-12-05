<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class KelasEdit extends Component
{
    public $kelas_id, $nama_kelas, $tingkat, $tahun_ajaran;

    public function mount($id)
    {
        $kelas = Kelas::findOrFail($id);

        $this->kelas_id = $kelas->id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->tingkat = $kelas->tingkat;
        $this->tahun_ajaran = $kelas->tahun_ajaran;
    }

    public function update()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'tingkat' => 'required|numeric',
            'tahun_ajaran' => 'required',
        ]);

        Kelas::findOrFail($this->kelas_id)->update([
            'nama_kelas' => $this->nama_kelas,
            'tingkat' => $this->tingkat,
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);

        session()->flash('success', 'Data kelas berhasil diperbarui!');
        return redirect()->route('kelas.index');
    }
    public function render()
    {
        return view('livewire.kelas.kelas-edit');
    }
}

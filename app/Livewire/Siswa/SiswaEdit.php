<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Ortu;
use App\Models\Siswa;
use Livewire\Component;

class SiswaEdit extends Component
{
    public $id, $nis, $nama, $kelas_id, $jenis_kelamin, $alamat, $ortu_id;

    public function mount($id)
    {
        $s = Siswa::findOrFail($id);

        $this->id = $s->id;
        $this->nis = $s->nis;
        $this->nama = $s->nama;
        $this->kelas_id = $s->kelas_id;
        $this->ortu_id = $s->ortu_id;
        $this->jenis_kelamin = $s->jenis_kelamin;
        $this->alamat = $s->alamat;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|min:3',
            'kelas_id' => 'required',
            'ortu_id'=> 'required',
            'jenis_kelamin' => 'required',
        ]);

        Siswa::find($this->id)->update([
            'nama' => $this->nama,
            'kelas_id' => $this->kelas_id,
            'ortu_id'=> $this->ortu_id,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
        ]);

        session()->flash('success', 'Data siswa berhasil diperbarui!');
        return redirect()->route('siswa.index');
    }

    public function render()
    {
        return view('livewire.siswa.siswa-edit', [
            'kelas' => Kelas::all(),
            'ortu' => Ortu::all(),
        ]);
    }
}

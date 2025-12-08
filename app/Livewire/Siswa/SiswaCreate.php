<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Ortu;
use App\Models\Siswa;
use Livewire\Component;

class SiswaCreate extends Component
{
    public $nis, $nama, $kelas_id, $jenis_kelamin, $alamat, $ortu_id;

    public function save()
    {
        $this->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|min:3',
            'kelas_id' => 'required',
            'ortu_id'=> 'required',
            'jenis_kelamin' => 'required',
        ]);

        Siswa::create([
            'nis' => $this->nis,
            'nama' => $this->nama,
            'kelas_id' => $this->kelas_id,
            'ortu_id'=> $this->ortu_id,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
        ]);

      session()->flash('success', 'siswa berhasil ditambahkan!');
        return redirect()->route('siswa.index');
    
    }
    public function render()
    {
        return view('livewire.siswa.siswa-create', [
            'kelas' => Kelas::all(),
            'ortu' => Ortu::all(),
        ]);
    }
}

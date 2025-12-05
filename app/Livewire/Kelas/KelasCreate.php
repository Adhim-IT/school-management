<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class KelasCreate extends Component
{
    public $nama_kelas, $tingkat, $tahun_ajaran;
    public function save()
    {
        $this->validate([
            'nama_kelas' => 'required|string|min:2|max:10|regex:/^[A-Za-z0-9\s\-]+$/',
            'tingkat' => 'required|integer|min:1|max:12',
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
        ], [
            'nama_kelas.regex' => 'Nama kelas hanya boleh huruf, angka dan spasi.',
            'tingkat.integer' => 'Tingkat harus berupa angka.',
            'tahun_ajaran.regex' => 'Format tahun ajaran harus 2023/2024.',
        ]);

        Kelas::create([
            'nama_kelas' => $this->nama_kelas,
            'tingkat' => $this->tingkat,
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);

        session()->flash('success', 'Kelas berhasil ditambahkan!');
        return redirect()->route('kelas.index');
    }

    public function render()
    {

        return view('livewire.kelas.kelas-create');
    }
}

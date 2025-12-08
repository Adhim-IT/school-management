<?php

namespace App\Livewire\Ortu;

use App\Models\Ortu;
use Livewire\Component;

class OrtuCreate extends Component
{

    public $nama_ortu;
   public function save()
{
    $this->validate([
        'nama_ortu' => [
            'required',
            'string',
            'min:5',
            'max:200',
            'regex:/^[A-Za-z\s]+ & [A-Za-z\s]+$/',
        ],
    ], [
        'nama_ortu.required' => 'Nama orang tua wajib diisi.',
        'nama_ortu.regex' => 'Format harus: "Nama Ayah & Nama Ibu" (contoh: Budiman Santoso & Krisdayanti Anwar).',
        'nama_ortu.min' => 'Nama orang tua minimal 5 karakter.',
    ]);

    Ortu::create([
        'nama_ortu' => $this->nama_ortu,
    ]);

    session()->flash('success', 'Ortu berhasil ditambahkan!');
    return redirect()->route('ortu.index');
}
    public function render()
    {
        return view('livewire.ortu.ortu-create');
    }
}

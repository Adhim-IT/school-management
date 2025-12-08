<?php

namespace App\Livewire\Ortu;

use App\Models\Ortu;
use Livewire\Component;

class OrtuEdit extends Component
{

    public $ortu_id, $nama_ortu;

    public function mount($id)
    {
        $ortu = Ortu::findOrFail($id);
        $this->ortu_id = $ortu->id;
        $this->nama_ortu = $ortu->nama_ortu;
    }

    public function update()
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

        Ortu::findOrFail($this->ortu_id)->update([
            'nama_ortu' => $this->nama_ortu,
        ]);

        session()->flash('success', 'Data ortu berhasil diperbarui!');
        return redirect()->route('ortu.index');
    }

    public function render()
    {
        return view('livewire.ortu.ortu-edit');
    }
}

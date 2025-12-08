<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class GuruIndex extends Component
{
    use WithPagination;
    public $search = '';
    public $detailItem = null;
    protected $listeners = ['delete' => 'deleteGuru'];
    public $showAlert = false;
    public $alertMessage = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteGuru($id)
    {
        Guru::findOrFail($id)->delete();
        $this->showAlert = true;
        $this->alertMessage = 'Guru berhasil dihapus.';
        $this->resetPage();
    }
    public function showDetail($id)
    {
        $this->detailItem = Guru::with('kelas')->find($id);
    }

    public function closeDetail()
    {
        $this->detailItem = null;
    }
    public function render()
    {
        $guru = Guru::where('nama', 'like', "%{$this->search}%")
            ->orWhere('nip', 'like', "%{$this->search}%")
            ->paginate(10);
        return view('livewire.guru.guru-index', [
            'gurus' => $guru
        ]);
    }
}

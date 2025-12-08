<?php

namespace App\Livewire\Ortu;

use App\Models\Ortu;
use Livewire\Component;
use Livewire\WithPagination;

class OrtuIndex extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['delete' => 'deleteOrtu'];
    public $showAlert = false;
    public $alertMessage = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteOrtu($id)
    {
        Ortu::findOrFail($id)->delete();
        $this->showAlert = true;
        $this->alertMessage = 'Ortu berhasil dihapus.';
        $this->resetPage();
    }

    public function render()
    {
        $ortu = Ortu::where('nama_ortu', 'like', '%' . $this->search . '%')
            ->orderBy('nama_ortu')
            ->paginate(5);
        return view('livewire.ortu.ortu-index', [
            'ortu' => $ortu,
        ]);
    }
}

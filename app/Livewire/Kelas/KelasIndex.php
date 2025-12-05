<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;

class KelasIndex extends Component
{
    use WithPagination;

     public $search = '';

    protected $paginationTheme = 'tailwind';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

   public function delete($id)
    {
        Kelas::findOrFail($id)->delete();
        session()->flash('success', 'Kelas berhasil dihapus.');
    }

    public function render()
    {
        $kelas = Kelas::where('nama_kelas', 'like', '%' . $this->search . '%')
            ->orWhere('tingkat', 'like', '%' . $this->search . '%')
            ->orWhere('tahun_ajaran', 'like', '%' . $this->search . '%')
            ->orderBy('nama_kelas')
            ->paginate(5);

        return view('livewire.kelas.kelas-index', [
            'kelas' => $kelas,
        ]);
    }
}

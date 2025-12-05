<?php

namespace App\Livewire\Siswa;

use Livewire\WithPagination;
use App\Models\Siswa;
use Livewire\Component;

class SiswaIndex extends Component
{

    use WithPagination;

    public $search = '';
    public $detailItem = null;

    protected $listeners = ['delete' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function showDetail($id)
    {
        $this->detailItem = Siswa::with('kelas')->find($id);
    }

    public function closeDetail()
    {
        $this->detailItem = null;
    }

   public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        session()->flash('success', 'siswa berhasil dihapus.');
    }
    public function render()
    {
        $siswa = Siswa::with('kelas')
            ->where('nama', 'like', "%{$this->search}%")
            ->orWhere('nis', 'like', "%{$this->search}%")
            ->paginate(10);

        return view('livewire.siswa.siswa-index', [
            'siswa' => $siswa,
        ]);
    }
}

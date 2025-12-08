<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard\DashboardIndex;
use App\Livewire\Guru\GuruCreate;
use App\Livewire\Guru\GuruEdit;
use App\Livewire\Guru\GuruIndex;
use App\Livewire\Kelas\KelasCreate;
use App\Livewire\Kelas\KelasDelete;
use App\Livewire\Kelas\KelasEdit;
use App\Livewire\Kelas\KelasIndex;
use App\Livewire\Laporan\DataLengkap;
use App\Livewire\Laporan\GuruPerKelas;
use App\Livewire\Laporan\SiswaPerKelas;
use App\Livewire\Ortu\OrtuCreate;
use App\Livewire\Ortu\OrtuEdit;
use App\Livewire\Ortu\OrtuIndex;
use App\Livewire\Siswa\SiswaCreate;
use App\Livewire\Siswa\SiswaEdit;
use App\Livewire\Siswa\SiswaIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect()->route( 'login');
});
Route::get('/dashboard', DashboardIndex::class)
    ->name('dashboard')
    ->middleware('auth');



Route::get('/login', Login::class)
    ->name('login')
    ->middleware('guest');
Route::get('/register', Register::class)
    ->name('register')
    ->middleware('guest');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/kelas', KelasIndex::class)->name('kelas.index');
    Route::get('/kelas/create', KelasCreate::class)->name('kelas.create');
    Route::get('/kelas/{id}/edit', KelasEdit::class)->name('kelas.edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/siswa/create', SiswaCreate::class)->name('siswa.create');
    Route::get('/siswa/{id}/edit', SiswaEdit::class)->name('siswa.edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/guru', GuruIndex::class)->name('guru.index');
    Route::get('/guru/create', GuruCreate::class)->name('guru.create');
    Route::get('/guru/{id}/edit', GuruEdit::class)->name('guru.edit');
});

Route::prefix('laporan')->group(function () {
    Route::get('/siswa-per-kelas', SiswaPerKelas::class)
        ->name('laporan.siswa-per-kelas');
    Route::get('/guru-per-kelas', GuruPerKelas::class)
        ->name('laporan.guru-per-kelas');
    Route::get('/data-lengkap', DataLengkap::class)
        ->name('laporan.data-lengkap');
});


Route::middleware('auth')->group(function () {
    Route::get('/ortu', OrtuIndex::class)->name('ortu.index');
    Route::get('/ortu/create', OrtuCreate::class)->name('ortu.create');
    Route::get('/ortu/{id}/edit', OrtuEdit::class)->name('ortu.edit');
});
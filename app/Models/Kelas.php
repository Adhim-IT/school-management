<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama_kelas',
        'tingkat',
        'tahun_ajaran',
    ];


    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    // Relasi: Kelas memiliki banyak Guru
    public function guru()
    {
        return $this->hasMany(Guru::class, 'kelas_id');
    }


    public function getNamaLengkapAttribute()
    {
        return "{$this->nama_kelas} - {$this->tahun_ajaran}";
    }

    public function scopeTahunAjaran($query, $tahun)
    {
        return $query->where('tahun_ajaran', $tahun);
    }
}

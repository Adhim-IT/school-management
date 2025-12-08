<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
     use HasFactory;

    
    protected $fillable = [
        'nama_ortu',
    ];


    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'ortu_id');
    }
}

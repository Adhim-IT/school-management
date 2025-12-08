<?php

namespace Database\Seeders;

use App\Models\Ortu;
use Illuminate\Database\Seeder;

class OrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaAyah = [
            'Bambang Suryanto', 'Agus Wijaya', 'Hendra Gunawan', 'Budiman Santoso',
            'Supriyadi Rahman', 'Andi Prasetyo', 'Joko Susilo', 'Ridwan Kamil',
            'Dedi Mulyadi', 'Eko Purnomo', 'Fajar Setiawan', 'Guntur Wibowo',
        ];

        $namaIbu = [
            'Siti Rahayu', 'Ani Yudhoyono', 'Ratna Sari', 'Dewi Perssik',
            'Fitri Handayani', 'Gita Gutawa', 'Hesti Purwadinata', 'Inul Daratista',
            'Julia Perez', 'Krisdayanti Anwar', 'Lilis Karlina', 'Maia Estianty',
        ];

        for ($i = 1; $i <= 12; $i++) {
            $randomAyah = $namaAyah[array_rand($namaAyah)];
            $randomIbu = $namaIbu[array_rand($namaIbu)];
            
            Ortu::create([
                'nama_ortu' => $randomAyah . ' & ' . $randomIbu,
            ]);
        }
    }
}
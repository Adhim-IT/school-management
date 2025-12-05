<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $kelasData = [
            ['nama_kelas' => 'X-PPLG-1', 'tingkat' => '10', 'tahun_ajaran' => '2025/2026'],
            ['nama_kelas' => 'X-PPLG-2', 'tingkat' => '10', 'tahun_ajaran' => '2025/2026'],
            ['nama_kelas' => 'X-TKJ-1', 'tingkat' => '10', 'tahun_ajaran' => '2025/2026'],
            ['nama_kelas' => 'X-TKJ-2', 'tingkat' => '10', 'tahun_ajaran' => '2025/2026'],
            
            ['nama_kelas' => 'XI-PPLG-1', 'tingkat' => '11', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI-PPLG-2', 'tingkat' => '11', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI-TKJ-1', 'tingkat' => '11', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI-TKJ-2', 'tingkat' => '11', 'tahun_ajaran' => '2024/2025'],
            
            ['nama_kelas' => 'XII-PPLG-1', 'tingkat' => '12', 'tahun_ajaran' => '2023/2024'],
            ['nama_kelas' => 'XII-PPLG-2', 'tingkat' => '12', 'tahun_ajaran' => '2023/2024'],
            ['nama_kelas' => 'XII-TKJ-1', 'tingkat' => '12', 'tahun_ajaran' => '2023/2024'],
            ['nama_kelas' => 'XII-TKJ-2', 'tingkat' => '12', 'tahun_ajaran' => '2023/2024'],
        ];

        foreach ($kelasData as $kelas) {
            Kelas::create($kelas);
        }
    }
}

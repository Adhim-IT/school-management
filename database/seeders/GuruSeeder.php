<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $namaGuru = [
            'L' => [
                'Dr. Ahmad Subagyo, M.Pd',
                'Drs. Bambang Wijaya',
                'Prof. Candra Kusuma, M.Si',
                'Drs. Dwi Handoko, M.Pd',
                'Eko Prasetyo, S.Pd',
                'Fajar Hidayat, M.Pd',
                'Gunawan Setiawan, S.Pd',
                'Hadi Santoso, M.Si',
            ],
            'P' => [
                'Dr. Ani Susilowati, M.Pd',
                'Dra. Budi Lestari',
                'Prof. Citra Dewi, M.Si',
                'Dra. Dewi Sartika, M.Pd',
                'Eka Rahmawati, S.Pd',
                'Fitri Handayani, M.Pd',
                'Gita Puspita, S.Pd',
                'Hani Kusumaningrum, M.Si',
            ]
        ];

        $mataPelajaran = [
            'Matematika',
            'Fisika',
            'Kimia',
            'Biologi',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Sejarah',
            'Geografi',
            'Ekonomi',
            'Sosiologi',
            'Pendidikan Agama',
            'Pendidikan Jasmani',
        ];

        $nipCounter = 197001011998;

        for ($kelasId = 1; $kelasId <= 12; $kelasId++) {
            $jenisKelamin = $kelasId % 2 == 0 ? 'L' : 'P';
            $randomName = $namaGuru[$jenisKelamin][array_rand($namaGuru[$jenisKelamin])];
            
            Guru::create([
                'nip' => (string) ($nipCounter++),
                'nama' => $randomName,
                'kelas_id' => $kelasId,
                'mata_pelajaran' => $mataPelajaran[array_rand($mataPelajaran)],
                'jenis_kelamin' => $jenisKelamin,
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            $jenisKelamin = $i % 2 == 0 ? 'L' : 'P';
            $randomName = $namaGuru[$jenisKelamin][array_rand($namaGuru[$jenisKelamin])];
            
            Guru::create([
                'nip' => (string) ($nipCounter++),
                'nama' => $randomName,
                'kelas_id' => null,
                'mata_pelajaran' => $mataPelajaran[array_rand($mataPelajaran)],
                'jenis_kelamin' => $jenisKelamin,
            ]);
        }
    }
}

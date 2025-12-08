<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaSiswa = [
            'L' => [
                'Ahmad Fauzi', 'Budi Santoso', 'Cahya Pratama', 'Dimas Anggara',
                'Eko Prasetyo', 'Fahmi Ramadhan', 'Gilang Permana', 'Hendra Kusuma',
                'Indra Gunawan', 'Joko Widodo', 'Kurniawan Putra', 'Lukman Hakim',
                'Muhammad Rizki', 'Nugroho Adi', 'Oscar Wijaya', 'Putra Mahendra',
                'Rizal Maulana', 'Satria Bima', 'Teguh Santoso', 'Umar Bakri',
                'Wahyu Hidayat', 'Yudi Pranata', 'Zaki Rahman', 'Arif Setiawan',
            ],
            'P' => [
                'Ani Wijaya', 'Bella Safitri', 'Citra Dewi', 'Diah Ayu',
                'Eka Putri', 'Fitri Handayani', 'Gita Sari', 'Hani Puspita',
                'Indah Permata', 'Julia Rahmawati', 'Kartika Sari', 'Lilis Suryani',
                'Maya Anggraini', 'Nisa Amelia', 'Olivia Damayanti', 'Putri Wulandari',
                'Rani Lestari', 'Siti Nurhaliza', 'Tina Marlina', 'Umi Kalsum',
                'Vera Wati', 'Winda Lestari', 'Yuni Astuti', 'Zahra Kamila',
            ]
        ];

        $alamat = [
            'Jl. Merdeka No. 123, Jakarta',
            'Jl. Sudirman No. 45, Bandung',
            'Jl. Gatot Subroto No. 67, Surabaya',
            'Jl. Ahmad Yani No. 89, Semarang',
            'Jl. Diponegoro No. 12, Yogyakarta',
            'Jl. Imam Bonjol No. 34, Medan',
            'Jl. Pemuda No. 56, Makassar',
            'Jl. Veteran No. 78, Palembang',
        ];

        $nisCounter = 2024001;
        for ($kelasId = 1; $kelasId <= 12; $kelasId++) {
            for ($i = 0; $i < 5; $i++) {
                $jenisKelamin = $i % 2 == 0 ? 'L' : 'P';
                $randomName = $namaSiswa[$jenisKelamin][array_rand($namaSiswa[$jenisKelamin])];
                
                Siswa::create([
                    'nis' => (string) $nisCounter++,
                    'nama' => $randomName,
                    'kelas_id' => $kelasId,
                    'jenis_kelamin' => $jenisKelamin,
                    'alamat' => $alamat[array_rand($alamat)],
                    'ortu_id' => rand(1, 12),
                ]);
            }
        }
    }
}

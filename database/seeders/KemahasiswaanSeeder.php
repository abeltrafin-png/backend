<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kemahasiswaan;

class KemahasiswaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kemahasiswaan::create([
            'nama_peraturan' => 'Peraturan Kemahasiswaan No. 1 Tahun 2024',
            'deskripsi' => 'Peraturan tentang organisasi kemahasiswaan',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Kemahasiswaan::create([
            'nama_peraturan' => 'Peraturan Kemahasiswaan No. 2 Tahun 2024',
            'deskripsi' => 'Peraturan tentang kegiatan mahasiswa',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Kemahasiswaan::create([
            'nama_peraturan' => 'Peraturan Kemahasiswaan No. 3 Tahun 2024',
            'deskripsi' => 'Peraturan tentang beasiswa dan bantuan mahasiswa',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);
    }
}

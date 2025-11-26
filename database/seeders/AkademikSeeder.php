<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Akademik;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akademik::create([
            'nama_peraturan' => 'Peraturan Akademik No. 1 Tahun 2024',
            'deskripsi' => 'Peraturan tentang sistem penilaian akademik mahasiswa',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Akademik::create([
            'nama_peraturan' => 'Peraturan Akademik No. 2 Tahun 2024',
            'deskripsi' => 'Peraturan tentang kurikulum dan silabus mata kuliah',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Akademik::create([
            'nama_peraturan' => 'Peraturan Akademik No. 3 Tahun 2024',
            'deskripsi' => 'Peraturan tentang ujian akhir semester',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);
    }
}

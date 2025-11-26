<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administratif;

class AdministratifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administratif::create([
            'nama_peraturan' => 'Peraturan Administratif No. 1 Tahun 2024',
            'deskripsi' => 'Peraturan tentang administrasi akademik',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Administratif::create([
            'nama_peraturan' => 'Peraturan Administratif No. 2 Tahun 2024',
            'deskripsi' => 'Peraturan tentang pengelolaan dokumen',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Administratif::create([
            'nama_peraturan' => 'Peraturan Administratif No. 3 Tahun 2024',
            'deskripsi' => 'Peraturan tentang sistem informasi',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);
    }
}

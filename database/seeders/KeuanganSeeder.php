<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keuangan::create([
            'nama_peraturan' => 'Peraturan Keuangan No. 1 Tahun 2024',
            'deskripsi' => 'Peraturan tentang pengelolaan keuangan universitas',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Keuangan::create([
            'nama_peraturan' => 'Peraturan Keuangan No. 2 Tahun 2024',
            'deskripsi' => 'Peraturan tentang pembayaran SPP mahasiswa',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);

        Keuangan::create([
            'nama_peraturan' => 'Peraturan Keuangan No. 3 Tahun 2024',
            'deskripsi' => 'Peraturan tentang pengadaan barang dan jasa',
            'file_dokumen' => null,
            'status' => 'Aktif',
        ]);
    }
}

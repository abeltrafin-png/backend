<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_informasi')->insert([
            [
                'kategori' => 'berita',
                'judul' => 'Pembukaan Pendaftaran Mahasiswa Baru 2025',
                'isi' => 'Informasi penting mengenai pembukaan pendaftaran mahasiswa baru untuk tahun akademik 2025. Segera daftar untuk mendapatkan kesempatan bergabung dengan kami.',
                'tanggal_publish' => now(),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 'berita',
                'judul' => 'Workshop Pengembangan Karir Mahasiswa',
                'isi' => 'Workshop pengembangan karir untuk mahasiswa semester akhir akan diadakan bulan depan. Jangan lewatkan kesempatan ini untuk meningkatkan kompetensi Anda.',
                'tanggal_publish' => now()->subDays(2),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'kategori' => 'pengumuman',
                'judul' => 'Perubahan Jadwal Kuliah',
                'isi' => 'Ada perubahan jadwal kuliah untuk beberapa mata kuliah. Silakan cek portal akademik untuk informasi terbaru.',
                'tanggal_publish' => now()->subDays(1),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'kategori' => 'agenda',
                'judul' => 'Kunjungan Industri ke PT. Teknologi Maju',
                'isi' => 'Kunjungan industri ke PT. Teknologi Maju akan dilaksanakan pada tanggal 20 November 2025. Pendaftaran dibuka hingga 10 November.',
                'tanggal_publish' => now()->subDays(3),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'kategori' => 'berita',
                'judul' => 'Prestasi Mahasiswa di Kompetisi Nasional',
                'isi' => 'Tim mahasiswa berhasil meraih juara 2 dalam kompetisi nasional programming. Selamat atas pencapaiannya!',
                'tanggal_publish' => now()->subDays(5),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'kategori' => 'pengumuman',
                'judul' => 'Pembayaran SPP Semester Ganjil',
                'isi' => 'Pembayaran SPP semester ganjil tahun akademik 2025/2026 dapat dilakukan mulai tanggal 1 November hingga 30 November 2025.',
                'tanggal_publish' => now()->subDays(4),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'kategori' => 'pengumuman',
                'judul' => 'Jadwal Ujian Tengah Semester',
                'isi' => 'Berikut adalah jadwal ujian tengah semester untuk semua program studi. Pastikan untuk mempersiapkan diri dengan baik.',
                'tanggal_publish' => now(),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 'agenda',
                'judul' => 'Seminar Nasional Teknologi Informasi',
                'isi' => 'Seminar nasional tentang perkembangan teknologi informasi akan diadakan pada tanggal 15 November 2025. Hadiri untuk mendapatkan wawasan baru.',
                'tanggal_publish' => now(),
                'penulis' => 'Admin',
                'lampiran' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

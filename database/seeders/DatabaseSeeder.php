<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Create admin user for login
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@univ.ac.id',
            'password' => bcrypt('password'),
        ]);

        // Seed sample Berita data
        \App\Models\Berita::create([
            'judul' => 'Pengumuman Kuliah Online',
            'isi' => 'Kuliah online akan dilaksanakan mulai tanggal 1 Oktober 2023.',
            'foto' => 'kuliah_online.jpg',
            'penulis' => 'Admin',
            'tanggal' => '2023-10-01',
        ]);

        \App\Models\Berita::create([
            'judul' => 'Jadwal Ujian Akhir Semester',
            'isi' => 'Ujian akhir semester akan berlangsung dari 15 Desember hingga 20 Desember 2023.',
            'foto' => 'ujian.jpg',
            'penulis' => 'Dosen',
            'tanggal' => '2023-12-15',
        ]);

        // Seed sample Dosen data
        \App\Models\Dosen::create([
            'nidn' => '1234567890',
            'nama' => 'Dr. Ahmad Fauzi',
            'email' => 'ahmad.fauzi@univ.ac.id',
            'jurusan' => 'Teknik Informatika',
            'jabatan' => 'Lektor Kepala',
            'foto' => null,
        ]);

        \App\Models\Dosen::create([
            'nidn' => '0987654321',
            'nama' => 'Prof. Siti Nurhaliza',
            'email' => 'siti.nurhaliza@univ.ac.id',
            'jurusan' => 'Sistem Informasi',
            'jabatan' => 'Guru Besar',
            'foto' => null,
        ]);

        $dosen1 = \App\Models\Dosen::create([
            'nidn' => '1122334455',
            'nama' => 'Ir. Budi Santoso',
            'email' => 'budi.santoso@univ.ac.id',
            'jurusan' => 'Teknik Elektro',
            'jabatan' => 'Asisten Ahli',
            'foto' => null,
        ]);

        // Seed sample Project data - commented out as Project model may not exist
        // \App\Models\Project::create([
        //     'nama_project' => 'Sistem Informasi Akademik',
        //     'deskripsi' => 'Pengembangan sistem informasi untuk manajemen akademik universitas.',
        //     'status' => 'ongoing',
        //     'dosen_id' => $dosen1->id,
        // ]);

        // \App\Models\Project::create([
        //     'nama_project' => 'Aplikasi Mobile E-Learning',
        //     'deskripsi' => 'Aplikasi mobile untuk pembelajaran online.',
        //     'status' => 'completed',
        //     'dosen_id' => $dosen1->id,
        // ]);

        // Seed sample Matakuliah data
        \App\Models\Matakuliah::create([
            'kode_matkul' => 'TI101',
            'nama_matkul' => 'Pemrograman Dasar',
            'semester' => 1,
            'sks' => 3,
            'deskripsi' => 'Mata kuliah dasar pemrograman.',
            'dosen_id' => $dosen1->id,
        ]);

        \App\Models\Matakuliah::create([
            'kode_matkul' => 'TI201',
            'nama_matkul' => 'Struktur Data',
            'semester' => 3,
            'sks' => 3,
            'deskripsi' => 'Mata kuliah tentang struktur data dan algoritma.',
            'dosen_id' => $dosen1->id,
        ]);

        // Seed sample Mahasiswa data
        $mahasiswa1 = \App\Models\Mahasiswa::create([
            'nim' => '123456789',
            'nama' => 'John Doe',
            'email' => 'john.doe@student.univ.ac.id',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => 2020,
            'foto' => null,
        ]);

        $mahasiswa2 = \App\Models\Mahasiswa::create([
            'nim' => '987654321',
            'nama' => 'Jane Smith',
            'email' => 'jane.smith@student.univ.ac.id',
            'jurusan' => 'Sistem Informasi',
            'angkatan' => 2021,
            'foto' => null,
        ]);

        // Seed sample Project Mahasiswa data
        \App\Models\ProjectMahasiswa::create([
            'nama_project' => 'Aplikasi To-Do List',
            'deskripsi' => 'Aplikasi sederhana untuk mengelola daftar tugas.',
            'status' => 'ongoing',
            'mahasiswa_id' => $mahasiswa1->id,
        ]);

        \App\Models\ProjectMahasiswa::create([
            'nama_project' => 'Website Portofolio',
            'deskripsi' => 'Website untuk menampilkan portofolio pribadi.',
            'status' => 'completed',
            'mahasiswa_id' => $mahasiswa2->id,
        ]);

        // Seed sample Pengumuman data
        \App\Models\Pengumuman::create([
            'judul' => 'Pengumuman Libur Semester',
            'isi' => 'Libur semester akan dimulai pada tanggal 20 Desember 2023 hingga 5 Januari 2024.',
            'kategori' => 'Akademik',
            'tanggal_publish' => now(),
            'penulis' => 'Admin',
            'status' => 'published',
        ]);

        \App\Models\Pengumuman::create([
            'judul' => 'Beasiswa Unggulan Tahun 2024',
            'isi' => 'Pendaftaran beasiswa unggulan untuk mahasiswa berprestasi dibuka mulai 1 Januari 2024.',
            'kategori' => 'Beasiswa',
            'tanggal_publish' => now(),
            'penulis' => 'Bagian Kemahasiswaan',
            'status' => 'published',
        ]);

        // Seed regulation data
        $this->call([
            AkademikSeeder::class,
            KemahasiswaanSeeder::class,
            AdministratifSeeder::class,
            KeuanganSeeder::class,
        ]);
    }
}

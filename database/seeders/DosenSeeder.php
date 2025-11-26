<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $dosens = [
            ['nidn' => '001', 'nama' => 'Budi Antonio', 'email' => 'budi.santoso@univ.ac.id', 'jurusan' => 'Teknik Perangkat Lunak', 'jabatan' => 'Dosen Perangkat Lunak', 'foto' => 'foto-dosen/dosen.jpeg'],
            ['nidn' => '002', 'nama' => 'Kaharuddin, S.Kom., M.Kom.', 'email' => 'kaharuddin@example.com', 'jurusan' => 'Teknik Informatika', 'jabatan' => 'Dosen', 'foto' => 'foto-dosen/1759321697.jpeg'],
            ['nidn' => '003', 'nama' => 'Ilwan Syafrinal, S.Kom., M.Kom.', 'email' => 'ilwan@example.com', 'jurusan' => 'Teknik Informatika', 'jabatan' => 'Dosen', 'foto' => 'foto-dosen/1759321723.png'],
            ['nidn' => '004', 'nama' => 'Masparudin, S.Kom., M.Kom.', 'email' => 'masparudin@example.com', 'jurusan' => 'Teknik Informatika', 'jabatan' => 'Dosen', 'foto' => 'foto-dosen/1759321750.png'],
            ['nidn' => '005', 'nama' => 'Mega Jaya, S.T., M.T.I.', 'email' => 'mega@example.com', 'jurusan' => 'Teknik Informatika', 'jabatan' => 'Dosen', 'foto' => 'foto-dosen/1759321781.jpeg'],
        ];

        foreach ($dosens as $dosen) {
            DB::table('tbl_dosen')->updateOrInsert(
                ['nidn' => $dosen['nidn']],
                $dosen
            );
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerAlumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_tracer_alumni';

    protected $primaryKey = 'id_tracer';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'program_studi',
        'tahun_lulus',
        'email',
        'no_hp',
        'status_pekerjaan',
        'nama_perusahaan',
        'jabatan',
        'bidang_pekerjaan',
        'alamat_perusahaan',
        'tanggal_mulai',
        'gaji_awal',
        'posisi',
        'gaji',
        'lokasi',
        'periode_berkerja',
        'komentar',
        'lama_mendapat_pekerjaan',
        'relevansi_pekerjaan',
        'kepuasan_pekerjaan',
        'saran_untuk_kampus',
        'tanggal_pengisian',
    ];

    protected $casts = [
        'tahun_lulus' => 'integer',
        'tanggal_mulai' => 'date',
        'gaji_awal' => 'decimal:2',
        'gaji' => 'decimal:2',
        'tanggal_pengisian' => 'datetime',
    ];
}

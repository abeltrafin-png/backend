<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'tbl_penelitian';
    protected $primaryKey = 'id_penelitian';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'judul_penelitian',
        'bidang_penelitian',
        'jenis_penelitian',
        'tahun',
        'lama_kegiatan',
        'sumber_dana',
        'jumlah_dana',
        'anggota_peneliti',
        'mitra',
        'status_penelitian',
        'hasil_penelitian',
        'publikasi',
        'file_laporan',
        'tanggal_input',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'lama_kegiatan' => 'integer',
        'jumlah_dana' => 'decimal:2',
        'tanggal_input' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengabdianMasyarakat extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_pkm';

    // Primary key
    protected $primaryKey = 'id_pengabdian';

    // Nonaktifkan timestamps (karena tabel tidak punya created_at / updated_at)
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nidn',
        'nama_dosen',
        'judul_pengabdian',
        'bidang_pengabdian',
        'lokasi',
        'tahun',
        'sumber_dana',
        'jumlah_dana',
        'mitra',
        'deskripsi',
        'file_laporan',
        'tanggal_input',
    ];
}

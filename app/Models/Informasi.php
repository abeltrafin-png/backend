<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_informasi';

    // Primary key
    protected $primaryKey = 'id_informasi';

    // Menggunakan timestamps
    public $timestamps = true;

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'kategori',
        'judul',
        'isi',
        'tanggal_publish',
        'penulis',
        'lampiran',
        'status',
    ];

    // Format casting untuk tanggal
    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_kurikulum';

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'semester',
        'sks',
        'deskripsi',
    ];
}

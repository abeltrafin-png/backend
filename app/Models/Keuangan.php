<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'tbl_keuangan';
    protected $primaryKey = 'id_keuangan';

    protected $fillable = [
        'nama_peraturan',
        'deskripsi',
        'file_dokumen',
        'tanggal_upload',
        'status',
    ];
}

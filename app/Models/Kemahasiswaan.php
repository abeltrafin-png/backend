<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemahasiswaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_kemahasiswaan';
    protected $primaryKey = 'id_kemahasiswaan';

    protected $fillable = [
        'nama_peraturan',
        'deskripsi',
        'file_dokumen',
        'tanggal_upload',
        'status',
    ];
}

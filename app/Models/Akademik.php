<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    use HasFactory;

    protected $table = 'tbl_akademik';
    protected $primaryKey = 'id_akademik';

    protected $fillable = [
        'nama_peraturan',
        'deskripsi',
        'file_dokumen',
        'tanggal_upload',
        'status',
    ];
}

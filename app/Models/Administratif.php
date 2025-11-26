<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administratif extends Model
{
    use HasFactory;

    protected $table = 'tbl_administratif';
    protected $primaryKey = 'id_administratif';

    protected $fillable = [
        'nama_peraturan',
        'deskripsi',
        'file_dokumen',
        'tanggal_upload',
        'status',
    ];
}

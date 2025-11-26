<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengaturan';

    protected $fillable = [
        'judul',
        'nomor_peraturan',
        'isi',
        'kategori',
        'file_url',
        'tanggal_berlaku',
        'status'
    ];

    protected $casts = [
        'tanggal_berlaku' => 'date',
    ];
}

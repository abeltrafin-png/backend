<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'kategori',
        'tanggal_publish',
        'penulis',
        'status',
    ];

    protected $dates = ['tanggal_publish'];
}

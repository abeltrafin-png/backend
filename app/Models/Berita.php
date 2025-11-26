<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'tbl_berita';

    protected $fillable = [
        'judul',
        'isi',
        'foto',
        'penulis',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}

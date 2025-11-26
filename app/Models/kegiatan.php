<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;

    protected $table = 'tbl_kegiatan';
    protected $fillable = ['judul', 'deskripsi', 'tanggal', 'lokasi']; 

    public function galeri()
    {
        return $this->hasMany(galeri::class, 'kegiatan_id');
    }
}

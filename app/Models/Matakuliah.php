<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'tbl_matakuliah';

    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'semester',
        'sks',
        'deskripsi',
        'dosen_id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}

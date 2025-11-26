<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_project_mahasiswa';

    protected $fillable = [
        'nama_project',
        'deskripsi',
        'status',
        'mahasiswa_id',
        'foto',
    ];

    protected $appends = ['foto_url'];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
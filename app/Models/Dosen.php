<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'tbl_dosen';

    protected $fillable = [
        'nidn',
        'nama',
        'email',
        'jurusan',
        'jabatan',
        'foto'
    ];

    protected $appends = ['foto_url'];

    /**
     * Accessor untuk mendapatkan URL foto penuh
     */
    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('default-avatar.png');
        }

        $path = $this->foto;

        // Hilangkan prefix yang salah jika ada
        if (str_starts_with($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        } elseif (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        // Hasil akhir: http://domain/storage/foto-dosen/xxx.jpg
        return asset('storage/' . $path);
    }
}

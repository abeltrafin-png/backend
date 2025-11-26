<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumni';

    protected $primaryKey = 'NIM';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'NIM',
        'nama',
        'angkatan',
        'jurusan',
        'pekerjaan',
        'kisah_sukses',
        'foto_url',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function scopeFilterAngkatanAbove2022($query)
    {
        return $query->where('angkatan', '>', 2022);
    }
}

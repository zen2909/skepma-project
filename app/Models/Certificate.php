<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'tahun',
        'file_path',
        'status',
        'points',
        'tingkat_lomba',
        'tingkat_kegiatan',
        'prestasi',
        'status_keikutsertaan',
        'jabatan',
        'deskripsi_detail'
    ];
}
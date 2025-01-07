<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificate_data extends Model
{
    protected $table = 'certificates_data';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'jenis',
        'tingkat_lomba',
        'tingkat_kegiatan',
        'prestasi',
        'status_keikutsertaan',
        'jabatan',
        'deskripsi_detail',
        'points',
        'kode_sertifikat',
    ];
}
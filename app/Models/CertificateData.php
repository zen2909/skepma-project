<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateData extends Model
{
    protected $table = 'certificate_data';

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
    ];
}
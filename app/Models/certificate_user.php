<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificate_user extends Model
{
    protected $table = 'certificates_upload';
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
        'deskripsi_detail',
        'kode_sertifikat',
    ];
}
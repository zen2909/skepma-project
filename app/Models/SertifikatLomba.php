<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikatLomba extends Model
{
    protected $table = 'sertifikat_lomba';
    protected $fillable = [
        'jenis',
        'tingkat_lomba',
        'prestasi',
        'points',
    ];
}
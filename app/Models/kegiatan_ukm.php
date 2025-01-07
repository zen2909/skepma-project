<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan_ukm extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_kegiatan_ukm';
    protected $fillable = ['jabatan', 'deskripsi_detail', 'poin'];
}
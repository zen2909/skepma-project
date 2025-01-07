<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_komunikasi extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_forum_komunikasi_ilmiah';
    protected $fillable = ['tingkat_kegiatan', 'status_keikutsertaan', 'poin'];
}
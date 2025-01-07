<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lomba_kreatifitas extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_lomba_kreatifitas';
    protected $fillable = ['tingkat_lomba', 'prestasi', 'poin'];
}
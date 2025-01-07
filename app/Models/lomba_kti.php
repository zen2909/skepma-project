<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lomba_kti extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_lomba_kti';
    protected $fillable = ['tingkat_lomba', 'prestasi', 'poin'];
}
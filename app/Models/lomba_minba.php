<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lomba_minba extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_minba';
    protected $fillable = ['tingkat_lomba', 'prestasi', 'poin'];
}
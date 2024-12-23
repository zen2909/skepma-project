<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengurus_ukm extends Model
{
    use HasFactory;

    protected $fillable = ['jabatan ', 'deskripsi_detail', 'poin'];
}
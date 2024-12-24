<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_komunikasi extends Model
{
    use HasFactory;

    protected $fillable = ['tingkat', 'status_keikutsertaan', 'poin'];
}
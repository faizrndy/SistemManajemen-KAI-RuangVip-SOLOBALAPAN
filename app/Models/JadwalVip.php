<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalVip extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'mulai',
        'selesai',
        'media',
        'tamu',
        'pic',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}

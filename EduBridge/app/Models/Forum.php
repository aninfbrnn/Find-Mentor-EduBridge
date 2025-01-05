<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_forum',
        'type',
        'komentar',
        'nama_pengguna',
    ];

    protected $casts = [
        'komentar' => 'array', // Cast kolom komentar ke array
    ];
}

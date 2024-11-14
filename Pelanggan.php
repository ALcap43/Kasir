<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'pelanggan';

    // Tentukan kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'no_telp',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Rental extends Model
{
    use HasFactory;
    protected $table = 'master_rentals';
    protected $fillable = [
        'nama_rental',
        'nomor_telp',
        'kota',
        'alamat',
        'email',
        'website',
        'map_lokasi',
        'gambar',
        'status_best',
    ];
}

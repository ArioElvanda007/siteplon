<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Profile extends Model
{
    use HasFactory;
    protected $table='master_profiles';
    protected $fillable=[
        'title',
        'deskripsi_1',
        'deskripsi_2',
        'copyright',
        'nomor_telp',
        'email',
        'alamat',
        'map_lokasi',
        'gambar',
        'id_profile',
    ];
}

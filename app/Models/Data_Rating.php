<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Rating extends Model
{
    use HasFactory;
    protected $table = 'data_ratings';
    protected $fillable = [
        'id_rental',
        'id_serial',
        'jml_rating'
    ];
}

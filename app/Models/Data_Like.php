<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Data_Like extends Model
{
    // use Rateable;
    use HasFactory;
    protected $table = 'data_likes';
    protected $fillable = [
        'id_rental',
        'id_serial',
    ];
}

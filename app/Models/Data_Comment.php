<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Comment extends Model
{
    use HasFactory;
    protected $table = 'data_comments';
    protected $fillable = [
        'id_rental',
        'nama',
        'email',
        'comment',
        'status_comment',
        'status_read'
    ];

    //fungsi untuk menampilkan updateed_at dengan format tanggalnya
    public function getCreatedAtAttribute($value)
    {
        return now()->parse($value)->timezone(config('app.timezone'))->diffForHumans();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'judul',
        'tanggal',
        'gambar',
        'status',
        'isi',
    ];
}

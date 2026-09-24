<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $primaryKey = 'id_galeri';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];
}
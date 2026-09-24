<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'id_user',
    ];
}
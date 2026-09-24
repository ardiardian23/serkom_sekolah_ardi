<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nama_prestasi',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}
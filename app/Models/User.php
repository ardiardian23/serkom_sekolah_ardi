<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids;

    protected $table = 'user';

    protected $primaryKey = 'id_user';
    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /** 
     * 
     *  @var list<string>
    */
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */

    

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
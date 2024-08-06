<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';

    use HasFactory, Notifiable;

    public function information(){
        return $this->belongsTo(Information::class,"id_author","id");
    }

    public function role(){
        return $this->hasOne(Role::class,"id","id_role");
    }

    public function isAdmin(){
        return $this->role->kode_role == 'A001';
    }

    public function isCamaba(){
        return $this->role->kode_role == 'A002';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'bukti_pembayaran',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

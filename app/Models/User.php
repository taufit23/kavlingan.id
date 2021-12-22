<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('publik/images/default_profil.png');
        }
        return asset(auth()->user()->avatar);
    }
    public function data_tanah()
    {
        return $this->hasMany(Data_tanah::class, 'id');
    }
    public function databank()
    {
        return $this->hasMany(Databank::class);
    }
    public function ktp_user()
    {
        return $this->belongsTo(Ktp_user::class, 'id_ktp_user');
    }
    public function alamat_user()
    {
        return $this->belongsTo(Alamat_user::class, 'id_alamat_user');
    }
    public function pekerjaan_user()
    {
        return $this->belongsTo(Pekerjaan_user::class, 'id_pekerjaan_user');
    }
    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'id_rekening');
    }
}
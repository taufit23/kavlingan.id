<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat_user extends Model
{
    use HasFactory;
    protected $table = 'alamat_user';
    protected $guarded = [];
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
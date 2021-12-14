<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan_user extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan_user';
    protected $guarded = [];
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
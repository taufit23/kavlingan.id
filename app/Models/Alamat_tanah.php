<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat_tanah extends Model
{
    use HasFactory;
    protected $table = 'alamat_tanah';
    protected $guarded = [];
    public function Data_tanah()
    {
        return $this->hasOne(Data_tanah::class);
    }
}
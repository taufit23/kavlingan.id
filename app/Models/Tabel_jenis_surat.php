<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabel_jenis_surat extends Model
{
    use HasFactory;
    protected $table = 'tabel_jenis_surat';
    protected $guarded = [];
    public function Data_tanah()
    {
        return $this->hasOne(Data_tanah::class, 'id');
    }
}
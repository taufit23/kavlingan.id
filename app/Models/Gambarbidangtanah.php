<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambarbidangtanah extends Model
{
    use HasFactory;
    protected $table = 'gambar_bidang_tanah';
    protected $guarded = [];

    public function Data_tanah()
    {
        return $this->belongsTo(Data_tanah::class, 'id');
    }
}
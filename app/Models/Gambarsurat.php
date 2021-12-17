<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambarsurat extends Model
{
    use HasFactory;
    protected $table = 'gambar_surat';
    protected $guarded = [];

    public function Data_tanah()
    {
        return $this->belongsTo(Data_tanah::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = [];

    public function user_pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli');
    }
    public function user_penjual()
    {
        return $this->belongsTo(User::class, 'id_penjual');
    }
    public function data_tanah()
    {
        return $this->belongsTo(Data_tanah::class, 'id_tanah');
    }
}
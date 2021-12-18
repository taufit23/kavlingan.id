<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_tanah extends Model
{
    use HasFactory;
    protected $table = 'data_tanah';
    protected $guarded = [];

    public function getGambartanah()
    {
        if (!$this->gambar_bidang_tanah) {
            return asset('publik/images/default_tanah.jpg');
        }
        return asset($this->gambar_bidang_tanah);
    }
    public function getGambarsurat()
    {
        if (!$this->gambar_surat) {
            return asset('publik/images/default_surat.jpg');
        }
        return asset($this->gambar_surat);
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
    public function Alamat_tanah()
    {
        return $this->belongsTo(Alamat_tanah::class, 'id_alamat_tanah');
    }
    public function Gambarsurat()
    {
        return $this->hasMany(Gambarsurat::class, 'id_data_tanah');
    }
    public function Gambarbidangtanah()
    {
        return $this->hasMany(Gambarbidangtanah::class, 'id_data_tanah');
    }
    public function Surat_tanah()
    {
        return $this->belongsTo(Surat_tanah::class, 'id_surat_tanah');
    }
    public function Tabel_jenis_surat()
    {
        return $this->belongsTo(Tabel_jenis_surat::class, 'id');
    }
}
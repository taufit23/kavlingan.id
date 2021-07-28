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
        }return asset($this->gambar_bidang_tanah);
    }
    public function getGambarsurat()
    {
        if (!$this->gambar_surat) {
            return asset('publik/images/default_surat.jpg');
        }return asset($this->gambar_surat);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}

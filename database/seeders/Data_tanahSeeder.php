<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Data_tanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panjang_tanah = rand(1, 1000000000000);
        $lebar_tanah = rand(1, 10000000000);
        for ($i = 0; $i < 50; $i++) {
            DB::table('data_tanah')->insert([
                'id_user' => 4,
                'id_jenis_surat' => 1,
                'nomor_surat' => rand(1111111, 99999999999),
                'nama_pemilik' => Str::random(20),
                'panjang_tanah' => $panjang_tanah,
                'lebar_tanah' => $lebar_tanah,
                'fasilitas_tanah' => 'TANAH_KOSONG' or 'TANAH_DAN_RUMAH' or 'TANAH_DAN_KEBUN',
                'harga_tanah' => rand(10000, 9999999),
                'alamat' => null,
                'deskripsi_tanah' => 'Dijual tanah seluas' . $panjang_tanah . ' X ' . $lebar_tanah,
                'gambar_surat' => '/images/gambar_surat/fakersurat.jpg',
                'gambar_bidang_tanah' => '/images/gambar_tanah/fakertanah.jpg',
                'status' => null,
            ]);
        }
    }
}
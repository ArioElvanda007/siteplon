<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_profiles')->insert([
            'title' => 'SITEPLON',
            'deskripsi_1' => 'Sistem Informasi Rental Mainan Playground',
            'deskripsi_2' => 'Penyedia mainan anak untuk playground indoor maupun outdoor',
            'copyright' => '2021 Siteplon',
            'nomor_telp' => '021-03xxxxx',
            'email' => 'siteplon@gmail.com',
            'alamat' => 'jl. narogong',
            'map_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.297207622325!2d106.9734354500814!3d-6.35556019537828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69921351e523cf%3A0xcd97a900c95104fa!2sJl.%20Raya%20Narogong%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1627692366357!5m2!1sen!2sid',
            'gambar' => 'no image.png',
        ]);
    }
}

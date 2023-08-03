<?php

use Illuminate\Database\Seeder;
use App\Models\Jasa;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jasa::create([
            'nama_jasa' => 'Paint/Repaint',
            'deskripsi_jasa' => 'Apakah anda ingin memberikan tampilan baru pada motor anda? Apakah anda bosan dengan warna motor/pelek yang monoton? Jangan khawatir! bengkel kami juga menyediakan jasa cat motor cuma dengan Rp 500 ribu untuk full body dan untuk velg saja mulai dengan Rp 200 ribu.',
        ]);

        Jasa::create([
            'nama_jasa' => 'Servis',
            'deskripsi_jasa' => 'Kami juga menyediakan jasa servis motor mulai dari ganti oli, throttle body, dan lain-lain. Mulai dengan harga Rp 150 ribu untuk full servis motor matic kesayangan anda.',
        ]);

        Jasa::create([
            'nama_jasa' => 'Tune Up/Modif CVT',
            'deskripsi_jasa' => 'Apakah anda ingin membuat tarikan motor matic anda lebih ringan? Tenang saja, bengkel kami menyediakan jasa upgrade cvt membuat motor lebih enteng dan lebih kencang.',
        ]);
    }
}

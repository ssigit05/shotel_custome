<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasHotel;

class FasilitasHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Kolam Renang',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Kolam renang buat renang lah hehe',
            ]);

        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Restoran',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Restoran anu tempat makan',
            ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Parkiran',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Jelas buat tempat parkir',
            ]);
    }
}

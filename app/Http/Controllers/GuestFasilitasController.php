<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Helper\ImageUrl;

class GuestFasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasHotel::get();

        $fasilitas->map(function($item){
            $item->nama_fasilitas_hotel = ucwords($item->nama_fasilitas_hotel);
            $item->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/',$item->foto_fasilitas_hotel);
        });

        return view('fasilitas',['fasilitas'=>$fasilitas  ]);
    }

    public function show(FasilitasHotel $fasilitas)
    {
        $fasilitas->nama_fasilitas_hotel = ucwords($fasilitas->nama_fasilitas_hotel);
        $fasilitas->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/',$fasilitas->foto_fasilitas_hotel);

        return view('fasilitas-show',['item'=>$fasilitas]);
    }
}

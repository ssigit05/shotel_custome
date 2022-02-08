<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use App\Helper\ImageUrl;

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasHotel::select('id','nama_fasilitas_hotel','foto_fasilitas_hotel')->get();
        $kamar = Kamar::select('id','foto_kamar','nama_kamar','harga_kamar')->get();

        $fasilitas->map(function($item){
            $item->nama_fasilitas_hotel = ucwords($item->nama_fasilitas_hotel);
            $item->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/',$item->foto_fasilitas_hotel);
            return $item;
        });

        $kamar->map(function($item){
            $item->nama_kamar = ucwords($item->nama_kamar);
            $item->foto_kamar =ImageUrl::get('images/kamar/',$item->foto_kamar);
            $item->harga_kamar = number_format($item->harga_kamar,0,',','.');
            return $item;
        });
        return view('welcome',[
            'fasilitas'=>$fasilitas,
            'kamar'=>$kamar,
        ]);
    }
}

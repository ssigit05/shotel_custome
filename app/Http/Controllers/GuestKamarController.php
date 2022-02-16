<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Helper\ImageUrl;
use App\Models\FasilitasKamar;

class GuestKamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::select('id','nama_kamar','foto_kamar','deskripsi_kamar','harga_kamar')->get();

        $kamar->map(function($item){
            $item->nama_kamar = ucwords($item->nama_kamar);
            $item->foto_kamar = ImageUrl::get('images/kamar/',$item->foto_kamar);
            $item->harga_kamar = number_format($item->harga_kamar,0,',','.');
            return $item;
        });
        return view('kamar',['kamar'=>$kamar]);
    }

    public function show(Kamar $kamar)
    {
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->foto_kamar = ImageUrl::get('images/kamar/',$kamar->foto_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');

        $fasilitas = FasilitasKamar::where('kamar_id',$kamar->id)->get();   
        
        return view('kamar-show',['item'=>$kamar,'fasilitas'=>$fasilitas]);
    }
}

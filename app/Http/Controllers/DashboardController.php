<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Models\FasilitasHotel;
use App\Models\Admin;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::select(
            DB::raw("SUM(IF(status = 'pesan',1,0) ) as jum_permintaan"),
            DB::raw("SUM(IF(status = 'checkin',1,0) ) as jum_checkin"),
        )->first();

        $kamar = Kamar::select(
            DB::raw('count(id) as jum_kamar'),
        )->first();

        $fasilitas = FasilitasHotel::select(
            DB::raw('count(id) as jum_fasilitas'),
        )->first();

        $admin = Admin::select(
            DB::raw('count(id) as jum_admin'),
        )->first();

        return view('dashboard',[
            'pemesanan'=>$pemesanan,
            'kamar'=>$kamar,
            'fasilitas'=>$fasilitas,
            'admin'=>$admin,
            'data_chart'=> $this->data_chart()
        ]);
    }

    public function data_chart()
    {
        $pemesanan = Pemesanan::select(
            'created_at',
            DB::raw('count(*) as jum_pemesanan')
        )
        // ->whereDate('created_at','>=','-1 month')
        ->whereMonth('created_at',date('m'))
        ->orderBy('created_at')
        ->groupBy('created_at')
        ->get();

        $data = ['label'=>[],'data'=>[]];
        foreach($pemesanan as $item){
            $data['label'][] = date('d/m/Y', strtotime($item->created_at));
            $data['data'][] = $item->jum_pemesanan;
        }
        return $data;
    }
}

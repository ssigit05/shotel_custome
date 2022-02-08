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
            'admin'=>$admin
        ]);
    }
}

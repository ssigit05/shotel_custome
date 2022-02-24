@extends('layouts.tamu',['title'=>'Reservasi'])
@section('content')

    
    <div class="row mt-4 ">
        <div class="col-lg-8 offset-lg-2">

            <div class="jumbotron shadow border">
                <h1 class="display-4">Berhasil!</h1>
                <p class="lead">Terimakasih {{ $item->nama_tamu}} ,telah melakukan reservasi dihotel kami.</p>
                <hr class="my-4">
                <p>Untuk selanjutnya silahkan cetak atau download Booking Invoice.</p>
                <a href="{{ route('guest.reservasi.invoice',['pemesanan'=>$item->id])}}"
                    class="btn btn-primary btn-lg"
                    target="__blank">
                    <i class="fas fa-print"></i> Cetak Booking Invoice
                </a>
              </div>

        </div>
    </div>
@endsection
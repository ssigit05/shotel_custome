@extends('layouts.tamu',['title'=>$item->nama_kamar])

@section('content')
    <h1 class="text-center my-4">{{$item->nama_kamar}}</h1>
    <div class="row">
        <div class="col">
            <img src="{{ $item->foto_kamar}} " class="img-fluid w-100">
        </div>
        <div class="col">
            <h5>Rp. {{ $item->harga_kamar}} <small>/ Malam</small></h5>
            <p>
                Fasilitas :
                <ul>
                    @foreach ($fasilitas as $fasi)
                        <li>{{ $fasi->nama_fasilitas_kamar }}</li>
                    @endforeach
                </ul>
            </p>
            {{ $item->deskripsi_kamar}}
        </div>
    </div>
    
@endsection
@extends('layouts.tamu',['title'=>$item->nama_fasilitas_hotel])

@section('content')
    <h1 class="text-center my-4">{{$item->nama_fasilitas_hotel}}</h1>
    <div class="row">
        <div class="col">
            <img src="{{ $item->foto_fasilitas_hotel}} " class="img-fluid w-100">
        </div>
        <div class="col">
            {{ $item->deskripsi_fasilitas_hotel}}
        </div>
    </div>
    
@endsection
@extends('layouts.admin',['title'=>'Kamar Edit'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-bed"></i>  Kamar Edit</h1>
@endsection

@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-edit :action="route('kamar.update',['kamar'=>$item->id])" :upload="true">
            <x-input Label="Nama Kamar / Tipe Kamar" name="nama_kamar" :value="$item->nama_kamar"/>
                @if ($item->foto_kamar)
                    <div class="form-group">
                        <img src="{{ url('images/kamar/'.$item->foto_kamar)}}" class="img-fluid">
                    </div>
                @endif
            <x-input Label="Foto" name="foto_kamar" type="file" keterangan="Foto bertipe : png,jpg,jpeg. Dimensi : min height 500px, min width 1000px. Ukuran : min 50kb, max 5000kb."/>
            <x-input Label="Jumlah" name="jumlah_kamar" type="number" :value="$item->jum_kamar"/>
            <x-input Label="Harga" name="harga_kamar" type="number" :value="$item->harga_kamar"/>
            <x-textarea Label="Deskripsi" name="deskripsi_kamar" :value="$item->deskripsi_kamar"/>
        </x-form-edit>
        </div>
    </div>
@endsection
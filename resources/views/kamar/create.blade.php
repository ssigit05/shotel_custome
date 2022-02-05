@extends('layouts.admin',['title'=>'Kamar Tambah'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-bed"></i>  Kamar Tambah</h1>
@endsection

@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-create :kembali="route('kamar.index')" :action="route('kamar.store')" :upload="true">
            <x-input Label="Nama Kamar / Tipe Kamar" name="nama_kamar"/>
            <x-input Label="Foto" name="foto_kamar" type="file" keterangan="Foto bertipe : png,jpg,jpeg. Dimensi : min height 500px, min width 1000px. Ukuran : min 50kb, max 5000kb."/>
            <x-input Label="Jumlah" name="jumlah_kamar" type="number"/>
            <x-input Label="Harga" name="harga_kamar" type="number"/>
            <x-textarea Label="Deskripsi" name="deskripsi_kamar"/>
        </x-form-create>
        </div>
    </div>
@endsection
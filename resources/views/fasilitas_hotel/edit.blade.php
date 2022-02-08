@extends('layouts.admin',['title'=>'Fasilitas Hotel'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-hotel"></i>  Fasilitas Hotel </h1>
@endsection


@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-edit :action="route('fasilitas.update',['fasilita'=>$item->id])" :upload="true">
            <x-input Label="Nama Fasilitas" name="nama_fasilitas" :value="$item->nama_fasilitas_hotel"/>
                <div class="form-group">
                    <img src="{{ $item->foto_fasilitas_hotel}}" class="img-fluid w-100">
                </div>
            <x-input Label="Foto" name="foto" type="file" keterangan="Foto bertipe : png,jpg,jpeg. Dimensi : min height 500px, min width 1000px. Ukuran : min 50kb, max 5000kb."/>
            <x-textarea Label="Deskripsi" name="deskripsi" :value="$item->deskripsi_fasilitas_hotel"/>
        </x-form-create>
        </div>
    </div>
@endsection
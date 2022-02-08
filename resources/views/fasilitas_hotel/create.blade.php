@extends('layouts.admin',['title'=>'Fasilitas Hotel'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-hotel"></i>  Fasilitas Hotel </h1>
@endsection


@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-create :kembali="route('fasilitas.index')" :action="route('fasilitas.store')" :upload="true">
            <x-input Label="Nama Fasilitas" name="nama_fasilitas"/>
            <x-input Label="Foto" name="foto" type="file" keterangan="Foto bertipe : png,jpg,jpeg. Dimensi : min height 500px, min width 1000px. Ukuran : min 50kb, max 5000kb."/>
            <x-textarea Label="Deskripsi" name="deskripsi"/>
        </x-form-create>
        </div>
    </div>
@endsection
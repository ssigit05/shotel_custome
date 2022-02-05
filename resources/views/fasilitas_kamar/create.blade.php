@extends('layouts.admin',['title'=>'Fasilitas Kamar '.ucwords( $kamar->nama_kamar )])
@section('content-header') 
    <h1 class="m-0"><i class="fas fa-tv"></i>  Fasilitas Kamar {{ ucwords($kamar->nama_kamar)}}</h1>
@endsection

@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-create :kembali="route('kamar.fasilitas.index',['kamar'=>$kamar->id])" :action="route('kamar.fasilitas.store',['kamar'=>$kamar->id])" >
            <x-input Label="Nama Fasilitas" name="nama_fasilitas"/>
        </x-form-create>
        </div>
    </div>
@endsection
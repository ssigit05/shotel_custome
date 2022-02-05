@extends('layouts.admin',['title'=>'Tambah Admin'])
@section('content-header')
<h1 class="m-0"><i class="fas fa-user-plus"></i>  Tambah Admin</h1>
@endsection
@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-create :kembali="route('admin.index')" :action="route('admin.store')">
            <x-input label="Nama Lengkap" name="nama_lengkap"/>
            <x-input label="Username" name="username"/>
            <x-input label="Password" name="password" type="password"/>
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password"/>
        </x-form-create>    
        </div>
    </div>
@endsection
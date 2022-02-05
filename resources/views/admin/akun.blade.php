@extends('layouts.admin',['title'=>'Akun Saya'])
@section('content-header')
<h1 class="m-0"><i class="fas fa-user"></i>  Akun Saya</h1>
@endsection
@section('content')
<x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
        <x-form-edit :action="route('admin.akun')" :header="false">
            <x-input label="Nama Lengkap" name="nama_lengkap" :value="$item->nama"/>
            <x-input label="Username" name="username" :value="$item->username"/>
            <x-input label="Password" name="password" type="password"/>
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password"/>
        </x-form-create>    
        </div>
    </div>
@endsection
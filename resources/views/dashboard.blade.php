@extends('layouts.admin',['title'=>'Dashboard'])

@section('content-header')
<div class="container">
  <h1 class="m-0">Dashboard</h1>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <x-small-box label="Permintaan" 
    :value="$pemesanan->jum_permintaan" 
    icon="fas fa-cash-register" 
    background="bg-warning"
    :link="route('pemesanan.index')"/>
  </div>

  <div class="col-lg-3 col-6">
    <x-small-box label="Check In" 
    :value="$pemesanan->jum_checkin" 
    icon="fas fa-door-closed" 
    background="bg-success"
    :link="route('pemesanan.index')"/>
  </div>

  <div class="col-lg-3 col-6">
    <x-small-box label="Kamar" 
    :value="$kamar->jum_kamar" 
    icon="fas fa-bed" 
    background="bg-indigo"
    :link="route('kamar.index')"/>
  </div>

  <div class="col-lg-3 col-6">
    <x-small-box label="Fasilitas Hotel" 
    :value="$fasilitas->jum_fasilitas" 
    icon="fas fa-hotel" 
    background="bg-purple"
    :link="route('fasilitas.index')"/>
  </div>

  @can('role', 'admin')
  <div class="col-lg-3 col-6">
    <x-small-box label="User Admin" 
    :value="$admin->jum_admin" 
    icon="fas fa-users" 
    background="bg-pink"
    :link="route('admin.index')"/>
  </div>
  @endcan
</div>

@include('dashboard/chart',['data_chart'=>$data_chart])
@endsection
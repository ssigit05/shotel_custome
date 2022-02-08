@extends('layouts.admin',['title'=>'Pemesanan'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-cash-register"></i>  Pemesanan </h1>
@endsection

@section('content')
<x-status/>
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    {{--  --}}
                </div>
                <div class="col">
                    <x-search-date/>
                </div>
            </div>
            
            
        </div>

        <x-card-body>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tamu</th>
                        <th>Kamar</th>
                        <th>Jumlah</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Malam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $data->firstItem();?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ ($item->nama_tamu)}}</td>
                        <td>{{ ($item->nama_kamar)}}</td>
                        <td>{{ ($item->jum)}}</td>
                        <td>{{ ($item->tgl_checkin)}}</td>
                        <td>{{ ($item->tgl_checkout)}}</td>
                        <td>{{ ($item->lamanya)}}</td>
                        <td>{{ ($item->status)}}</td>
                        <td>
                            <x-btn-show :link="route('pemesanan.show',['pemesanan'=>$item->id])" />
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </x-card-body>

        {{--  card-body  --}}
        <div class="card-body pb-0">
            {{ $data->appends(['search' => request()->search,'tanggal' => request()->tanggal])->links('bs4')}}
        </div>
        {{--  card-body  --}}
    </div>
@endsection
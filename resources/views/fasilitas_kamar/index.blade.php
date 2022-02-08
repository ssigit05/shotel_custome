@extends('layouts.admin',['title'=>'Fasilitas Kamar '.ucwords( $kamar->nama_kamar )])
@section('content-header') 
    <h1 class="m-0"><i class="fas fa-tv"></i>  Fasilitas Kamar {{ ucwords($kamar->nama_kamar)}}</h1>
@endsection

@section('content')
<x-status/>
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <a href="{{ route('kamar.index')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                    <x-btn-tambah :link="route('kamar.fasilitas.create',['kamar'=>$kamar->id])"/>
                </div>
            </div>
            
            
        </div>

        <x-card-body>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item->nama_fasilitas_kamar}}</td>
                        <td>
                            <x-btn-edit :link="route('kamar.fasilitas.edit',['kamar'=>$kamar->id,'fasilita'=>$item->id])"/>
                            <x-btn-delete :link="route('kamar.fasilitas.destroy',['kamar'=>$kamar->id,'fasilita'=>$item->id])"/>
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </x-card-body>

        {{--  card-body  --}}
    </div>
@endsection

@section('modal')
<!-- Modal -->
<x-modal-delete/>
@endsection
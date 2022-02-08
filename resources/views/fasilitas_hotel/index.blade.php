@extends('layouts.admin',['title'=>'Fasilitas Hotel'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-hotel"></i>  Fasilitas Hotel </h1>
@endsection

@section('content')
@can('role', 'admin')
   <x-status/> 
@endcan

    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    @can('role', 'admin')
                        <x-btn-tambah :link="route('fasilitas.create')"/>
                    @endcan
                    
                </div>
                <div class="col">
                    <x-search/>
                </div>
            </div>
            
            
        </div>

        <x-card-body>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $data->firstItem();?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ ($item->nama_fasilitas_hotel)}}</td>
                        <td>
                            <x-btn-show :link="route('fasilitas.show',['fasilita'=>$item->id])"/>
                                @can('role', 'admin')
                                    <x-btn-edit :link="route('fasilitas.edit',['fasilita'=>$item->id])"/>
                                    <x-btn-delete :link="route('fasilitas.destroy',['fasilita'=>$item->id])" />
                                 @endcan
                            
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </x-card-body>

        {{--  card-body  --}}
        <div class="card-body pb-0">
            {{ $data->appends(['search' => request()->search])->links('bs4')}}
        </div>
        {{--  card-body  --}}
    </div>
@endsection

@section('modal')
<!-- Modal -->
@can('role', 'admin')
    <x-modal-delete/>
@endcan

@endsection
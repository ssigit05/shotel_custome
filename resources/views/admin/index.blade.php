@extends('layouts.admin',['title'=>'User Admin'])
@section('content-header')
    <h1 class="m-0"><i class="fas fa-users"></i>  User Admin</h1>
@endsection
@section('content')
<x-status/>
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <x-btn-tambah :link="route('admin.create')"/>
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
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $data->firstItem();?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->username}}</td>
                        <td>{{ $item->role}}</td>
                        <td>
                            <x-btn-edit :link="route('admin.edit',['admin'=>$item->id])"/>
                            <x-btn-delete :link="route('admin.destroy',['admin'=>$item->id])" />
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
<x-modal-delete/>
@endsection
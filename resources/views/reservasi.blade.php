@extends('layouts.tamu',['title'=>'Reservasi'])
@section('content')

    <h1 class="text-center my-4">Reservasi</h1>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <form  action="?" class="card card-primary" method="post">
                
                <div class="card-header p-1"></div>
                <div class="card-body">
                    <x-input-reservasi label="Check In" 
                    name="checkin" type="date" :value="request()->checkin"
                    />
                    <x-input-reservasi label="Check Out" 
                    name="checkout" type="date" :value="request()->checkout"
                    />
                    <x-select-reservasi label="Kamar" 
                    name="kamar" :data-option="$kamar"
                    />
                    <x-input-reservasi label="Jumlah Kamar" 
                    name="jumlah_kamar" type="number" :value="request()->jumlah"
                    />
                    <x-input-reservasi label="Nama Pemesan" 
                    name="nama_pemesan"
                    />
                    <x-input-reservasi label="Alamat Email" 
                    name="email" type="email"
                    />
                    <x-input-reservasi label="Nomor Handphone" 
                    name="nomor_handphone"
                    />
                    <x-input-reservasi label="Nama Tamu" 
                    name="nama_tamu"
                    />
                </div>

                <div class="card-footer">
                    <button class="btn btn-block btn-lg m-auto btn-primary w-75" type="submit">
                        Booking Sekarang
                    </button>
                </div>

            </form>
            {{--  /card  --}}
        </div>
    </div>

@endsection
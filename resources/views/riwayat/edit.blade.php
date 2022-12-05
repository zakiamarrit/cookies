@extends('layouts.app')

@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="card mt-4">
        <div class="card-body">
    
            <h5 class="card-title fw-bolder mb-3">Ubah Data Riwayat</h5>
    
            <form method="post" action="{{ route('riwayat.update', $data->id_riwayat_produksi) }}">
                @csrf
                <div class="mb-3">
                    <label for="id_riwayat_produksi" class="form-label">ID Riwayat Produksi</label>
                    <input type="text" class="form-control" id="id_riwayat_produksi" name="id_riwayat_produksi" value="{{ $data->id_riwayat_produksi }}">
                </div>
                <div class="mb-3">
                    <label for="id_roti" class="form-label">ID Roti</label>
                    <input type="text" class="form-control" id="id_roti" name="id_roti" value="{{ $data->id_roti }}">
                </div>
                <div class="mb-3">
                    <label for="id_toko" class="form-label">ID toko</label>
                    <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_stok" class="form-label">tanggal stok</label>
                    <input type="text" class="form-control" id="tgl_stok" name="tgl_stok" value="{{ $data->tgl_stok }}">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
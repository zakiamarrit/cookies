@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="btn btn-outline-primary" role="button" aria-disabled="true" href="{{ route('toko.index') }}">Toko</a>
                        <a class="btn btn-outline-primary" role="button" aria-disabled="true" href="{{ route('roti.index') }}">Roti</a>
                        <a class="btn btn-outline-primary" role="button" aria-disabled="true" href="{{ route('pegawai.index') }}">Pegawai</a>
                      </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    RIWAYAT PRODUKSI + TOKO
                </div>
                <div class="card-body">
                    <table class="table table-hover mt-2">
                        <thead>
                        <tr>
                            <th>ID Riwayat Produksi</th>
                            <th>ID Roti</th>
                            <th>Jumlah</th>
                            <th>Tanggal Stok</th>
                            <th>ID Toko</th>
                            <th>Cabang Toko</th>
                            <th>Alamat</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id_riwayat_produksi}}</td>
                                    <td>{{ $data->id_roti }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ $data->tgl_stok }}</td>
                                    <td>{{ $data->id_toko}}</td>
                                    <td>{{ $data->cabang_toko }}</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                            @endforeach
                    
                        </tbody>
                    </table>
                
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

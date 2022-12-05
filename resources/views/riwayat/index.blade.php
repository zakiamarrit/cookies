@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <form method="get" action="{{ route('riwayat.index') }}" class="form-inline my-2 my-lg-0">
        @csrf
        <div class="row mt-3">
            <div class="col-sm-6">
                <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Cari Berdasarkan ID Riwayat" aria-label="Search" value="{{$filter}}">
            </div>
            <div class="col-sm-6">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-2">
    <a href="/" type="button" class="btn btn-outline-info text-black rounded-3">Home</a>
    <a href="{{ route('riwayat.create') }}" type="button" class="btn btn-outline-info text-black rounded-3">Tambah Riwayat</a>

    <div class="card mt-2">
        <div class="card-header">Riwayat</div>
        <div class="card-body">
            <table class="table table-hover mt-2">
                <thead>
                  <tr>
                    <th>ID Riwayat</th>
                    <th>ID Roti</th>
                    <th>ID Toko</th>
                    <th>Jumlah</th>
                    <th>Tanggal Stok</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id_riwayat_produksi }}</td>
                            <td>{{ $data->id_roti }}</td>
                            <td>{{ $data->id_toko }}</td>
                            <td>{{ $data->jumlah}}</td>
                            <td>{{ $data->tgl_stok}}</td>
                            <td>
                                <a href="{{ route('riwayat.edit', $data->id_riwayat_produksi) }}" type="button" class="btn btn-info rounded-3">Ubah</a>
                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_riwayat_produksi }}">
                                    Hapus
                                </button>
                
                                <!-- Modal -->
                                <div class="modal fade" id="hapusModal{{ $data->id_riwayat_produksi }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('riwayat.delete', $data->id_riwayat_produksi) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

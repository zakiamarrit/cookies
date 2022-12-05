@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <form method="get" action="{{ route('toko.index') }}" class="form-inline my-2 my-lg-0">
        @csrf
        <div class="row mt-3">
            <div class="col-sm-6">
                <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Cari Cabang Toko" aria-label="Search" value="{{$filter}}">
            </div>
            <div class="col-sm-6">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-2">
    <a href="/" type="button" class="btn btn-outline-info text-black rounded-3">Home</a>
    <a href="{{ route('toko.create') }}" type="button" class="btn btn-outline-info text-black rounded-3">Tambah Toko</a>

    <div class="card mt-2">
        <div class="card-header">Toko</div>
        <div class="card-body">
            <table class="table table-hover mt-2">
                <thead>
                  <tr>
                    <th>ID Toko</th>
                    <th>Cabang Toko</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id_toko }}</td>
                            <td>{{ $data->cabang_toko }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <a href="{{ route('toko.edit', $data->id_toko) }}" type="button" class="btn btn-info rounded-3">Ubah</a>
                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_toko }}">
                                    Hapus
                                </button>
                
                                <!-- Modal -->
                                <div class="modal fade" id="hapusModal{{ $data->id_toko }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('toko.delete', $data->id_toko) }}">
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

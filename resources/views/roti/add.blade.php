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
    
            <h5 class="card-title fw-bolder mb-3">Tambah Roti</h5>
    
            <form method="post" action="{{ route('roti.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_roti" class="form-label">ID Roti</label>
                    <input type="text" class="form-control" id="id_roti" name="id_roti">
                </div>
                <div class="mb-3">
                    <label for="nama_roti" class="form-label">Nama Roti</label>
                    <input type="text" class="form-control" id="nama_roti" name="nama_roti">
                </div>
                <div class="mb-3">
                    <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection
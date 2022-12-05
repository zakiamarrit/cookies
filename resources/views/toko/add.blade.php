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
    
            <h5 class="card-title fw-bolder mb-3">Tambah Toko</h5>
    
            <form method="post" action="{{ route('toko.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_toko" class="form-label">ID Toko</label>
                    <input type="text" class="form-control" id="id_toko" name="id_toko">
                </div>
                <div class="mb-3">
                    <label for="cabang_toko" class="form-label">Cabang Toko</label>
                    <input type="text" class="form-control" id="cabang_toko" name="cabang_toko">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection
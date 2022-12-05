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

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Toko</h5>

		<form method="post" action="{{ route('toko.update', $data->id_toko) }}">
			@csrf
            <div class="mb-3">
                <label for="id_toko" class="form-label">ID Toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">
            </div>
			<div class="mb-3">
                <label for="cabang_toko" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="cabang_toko" name="cabang_toko" value="{{ $data->cabang_toko }}">
            </div>
			<div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@endsection
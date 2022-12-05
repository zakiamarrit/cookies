@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <div class="card">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

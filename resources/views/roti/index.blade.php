@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header">Roti</div>
        <div class="card-body">
            <table class="table table-hover mt-2">
                <thead>
                  <tr>
                    <th>ID Roti</th>
                    <th>Nama Roti</th>
                    <th>tgl_kadaluarsa</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id_roti }}</td>
                            <td>{{ $data->nama_roti }}</td>
                            <td>{{ $data->tgl_kadaluarsa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

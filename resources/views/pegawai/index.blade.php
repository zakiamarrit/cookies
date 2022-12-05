@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header">Pegawai</div>
        <div class="card-body">
            <table class="table table-hover mt-2">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

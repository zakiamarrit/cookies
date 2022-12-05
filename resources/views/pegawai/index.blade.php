@extends('layouts.app')

@section('content')
    
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <a href="/" type="button" class="btn btn-outline-info text-black rounded-3">Home</a>
    <form method="get" action="{{ route('pegawai.index') }}" class="form-inline my-2 my-lg-0">
        @csrf
        <div class="row mt-3">
            <div class="col-sm-6">
                <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Cari Berdasarkan Nama" aria-label="Search" value="{{$filter}}">
            </div>
            <div class="col-sm-6">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="card mt-2">
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

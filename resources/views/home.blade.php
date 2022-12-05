@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Dashboard Cookies Store</div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>
                                <a href="{{ route('toko.index') }}">Toko</a>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('roti.index') }}">Roti</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('pegawai.index') }}">Pegawai</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

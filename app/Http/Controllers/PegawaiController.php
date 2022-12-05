<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from users');

        return view('pegawai.index')
            ->with('datas', $datas);
    }
}

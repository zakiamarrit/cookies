<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function index() {
        $datas = DB::select('select * from toko');

        return view('toko.index')
            ->with('datas', $datas);
    }
}

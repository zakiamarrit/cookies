<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RotiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from roti');

        return view('roti.index')
            ->with('datas', $datas);
    }
}

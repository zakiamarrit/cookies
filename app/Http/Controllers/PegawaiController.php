<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{

    public function index(Request $request)
    {
        $datas = DB::select('select * from users');
        if (!empty($request->filter)) {
            $datas =   DB::table('users')->where('name', 'like', '%' . $request->filter . '%')
                ->get();
        }

        return view('pegawai.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }
}

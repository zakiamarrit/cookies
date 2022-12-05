<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        $datas = DB::table('riwayat_produksi')
                    ->join('toko', 'toko.id_toko', '=', 'riwayat_produksi.id_toko')
                    ->get();

        return view('home')
            ->with('datas', $datas);
    }
}

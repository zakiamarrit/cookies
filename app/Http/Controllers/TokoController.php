<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::select('select * from toko');
        if (!empty($request->filter)) {
            $datas =   DB::table('toko')->where('cabang_toko', 'like', '%' . $request->filter . '%')
                ->get();
        }

        return view('toko.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }

    public function create() {
        return view('toko.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_toko' => 'required',
            'cabang_toko' => 'required',
            'alamat' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO toko(id_toko, cabang_toko, alamat) VALUES (:id_toko, :cabang_toko, :alamat)',
        [
            'id_toko' => $request->id_toko,
            'cabang_toko' => $request->cabang_toko,
            'alamat' => $request->alamat
        ]
        );

        return redirect()->route('toko.index')->with('success', 'Data Toko berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('toko')->where('id_toko', $id)->first();

        return view('toko.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_toko' => 'required',
            'cabang_toko' => 'required',
            'alamat' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE toko SET id_toko = :id_toko, cabang_toko = :cabang_toko, alamat = :alamat WHERE id_toko = :id',
            [
                'id' => $id,
                'id_toko' => $request->id_toko,
                'cabang_toko' => $request->cabang_toko,
                'alamat' => $request->alamat
            ]
        );

        return redirect()->route('toko.index')->with('success', 'Data toko berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM toko WHERE id_toko = :id_toko', ['id_toko' => $id]);

        return redirect()->route('toko.index')->with('success', 'Data toko berhasil dihapus');
    }

}
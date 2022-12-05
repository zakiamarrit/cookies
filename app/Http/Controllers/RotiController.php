<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RotiController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::select('select * from roti');
        if (!empty($request->filter)) {
            $datas =   DB::table('roti')->where('nama_roti', 'like', '%' . $request->filter . '%')
                ->get();
        }

        return view('roti.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }

    public function create() {
        return view('roti.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_roti' => 'required',
            'nama_roti' => 'required',
            'tgl_kadaluarsa' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO roti(id_roti, nama_roti, tgl_kadaluarsa) VALUES (:id_roti, :nama_roti, :tgl_kadaluarsa)',
        [
            'id_roti' => $request->id_roti,
            'nama_roti' => $request->nama_roti,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa
        ]
        );

        return redirect()->route('roti.index')->with('success', 'Data roti berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('roti')->where('id_roti', $id)->first();

        return view('roti.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_roti' => 'required',
            'nama_roti' => 'required',
            'tgl_kadaluarsa' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE roti SET id_roti = :id_roti, nama_roti = :nama_roti, tgl_kadaluarsa = :tgl_kadaluarsa WHERE id_roti = :id',
            [
                'id' => $id,
                'id_roti' => $request->id_roti,
                'nama_roti' => $request->nama_roti,
                'tgl_kadaluarsa' => $request->tgl_kadaluarsa
            ]
        );

        return redirect()->route('roti.index')->with('success', 'Data roti berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM roti WHERE id_roti = :id_roti', ['id_roti' => $id]);

        return redirect()->route('roti.index')->with('success', 'Data roti berhasil dihapus');
    }
}

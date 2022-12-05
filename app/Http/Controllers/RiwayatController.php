<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::select('select * from riwayat_produksi');
        if (!empty($request->filter)) {
            $datas =   DB::table('riwayat_produksi')->where('id_riwayat_produksi', 'like', '%' . $request->filter . '%')
                ->get();
        }

        return view('riwayat.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }

    public function create() {
        return view('riwayat.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_riwayat_produksi' => 'required',
            'id_roti' => 'required',
            'id_toko' => 'required',
            'jumlah' => 'required',
            'tgl_stok' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO riwayat_produksi(id_riwayat_produksi, id_roti, id_toko, jumlah, tgl_stok) VALUES (:id_riwayat_produksi, :id_roti, :id_toko, :jumlah, :tgl_stok)',
            [
                'id_riwayat_produksi' => $request->id_riwayat_produksi,
                'id_roti' => $request->id_roti,
                'id_toko' => $request->id_toko,
                'jumlah' => $request->jumlah,
                'tgl_stok' => $request->tgl_stok
            ]
        );

        return redirect()->route('riwayat.index')->with('success', 'Data roti berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('riwayat_produksi')->where('id_riwayat_produksi', $id)->first();

        return view('riwayat.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_riwayat_produksi' => 'required',
            'id_roti' => 'required',
            'id_toko' => 'required',
            'jumlah' => 'required',
            'tgl_stok' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE riwayat_produksi SET id_riwayat_produksi = :id_riwayat_produksi, id_roti = :id_roti, id_toko = :id_toko, jumlah = :jumlah, tgl_stok = :tgl_stok WHERE id_riwayat_produksi = :id',
            [
                'id' => $id,
                'id_riwayat_produksi' => $request->id_riwayat_produksi,
                'id_roti' => $request->id_roti,
                'id_toko,' => $request->id_toko,
                'jumlah,' => $request->jumlah,
                'tgl_stok' => $request->tgl_stok
            ]
        );

        return redirect()->route('riwayat.index')->with('success', 'Data roti berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM riwayat_produksi WHERE id_riwayat_produksi = :id_riwayat_produksi', ['id_riwayat_produksi' => $id]);

        return redirect()->route('riwayat.index')->with('success', 'Data riwayat berhasil dihapus');
    }
}

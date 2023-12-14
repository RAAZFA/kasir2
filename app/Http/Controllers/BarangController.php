<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'data Jenis',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => Barang::join('tbl_jenis_barang', 'tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
                ->select('tbl_barang.*', 'tbl_jenis_barang.nama_jenis')
                ->get(),
        );

        //return view('index',$data);
        return view('admin.master.barang.list', $data);
    }
    public function store(Request $request)
    {
        Barang::create([
            'id_jenis' => $request->id_jenis,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return redirect('/barang')->with('success', 'data berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        Barang::where('id', $id)
            ->where('id', $id)
            ->update([
                'id_jenis' => $request->id_jenis,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);

        return redirect('/barang')->with('success', 'data berhasil di ubah');
    }
    public function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('/barang')->with('success', 'data berhasil di hapus');
    }
}

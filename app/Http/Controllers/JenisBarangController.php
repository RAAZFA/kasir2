<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;
use Illuminate\Support\Facades\Hash;

class JenisBarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'data Jenis',
            'data_jenis' => JenisBarang::all(),
        );
        //return view('index',$data);
        return view('admin.master.jenisbarang.list', $data);
    }
    public function store(Request $request)
    {
        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/jenisbarang')->with('success', 'data berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        JenisBarang::where('id', $id)
            ->where('id', $id)
            ->update([
                'nama_jenis' => $request->nama_jenis,
            ]);

        return redirect('/jenisbarang')->with('success', 'data berhasil di ubah');
    }
    public function destroy($id){
        JenisBarang::where('id',$id)->delete();
        return redirect('/jenisbarang')->with('success','data berhasil di hapus');
    }
}

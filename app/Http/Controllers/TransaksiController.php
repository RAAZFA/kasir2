<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
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
}

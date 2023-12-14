<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'data Jenis',
            'data_jenis' => Transaksi::all(),
        );
        //return view('index',$data);
        return view('kasir.transaksi.list', $data);
    }
}

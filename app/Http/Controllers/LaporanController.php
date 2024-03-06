<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lap_barang()
    {
        $jenis_barang = JenisBarang::all();
        $barang = Barang::join('tbl_jenis_barang', 'tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
        ->select('tbl_barang.*', 'tbl_jenis_barang.nama_jenis')
        ->get();

        return view('admin.laporan.lap_barang', compact('barang', 'jenis_barang'));
    }
    public function lap_jenis()
    {
        $jbarang = JenisBarang::all();

        return view('admin.laporan.lap_jenis', compact('jbarang'));
    }
    public function lap_user()
    {
        $user = User::all();

        return view('admin.laporan.lap_user', compact('user'));
    }
}

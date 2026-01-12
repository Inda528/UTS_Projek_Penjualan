<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', ['data' => $barang]);
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('barang.form', ['kategori' => $kategori]);
    }

    public function simpan(Request $request)
    {
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('barang');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();

        return view('barang.form', compact('barang', 'kategori'));
    }

    public function update($id, Request $request)
    {
        Barang::findOrFail($id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('barang');
    }

    public function hapus($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang');
    }
}

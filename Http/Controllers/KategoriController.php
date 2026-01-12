<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function tambah()
    {
        return view('kategori.form');
    }

    public function simpan(Request $request)
    {
        Kategori::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.form', ['kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        Kategori::find($id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori');
    }

    // ✅ METHOD HAPUS (INI YANG SEBELUMNYA BELUM ADA)
    public function hapus($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori');
    }
}

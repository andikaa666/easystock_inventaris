<?php

namespace App\Http\Controllers;

use App\Models\Kategori_barang;
use App\Models\Barang;
use Illuminate\Http\Request;

class Kategori_barangController extends Controller
{
    public function index()
    {
        $kategori_barang = Kategori_barang::all();
        return view('kategori_barang.index', compact('kategori_barang'));
    }

    public function create()
    {
        $barang = Barang::all();
        $kategori_barang = Kategori_barang::all();
        return view('kategori_barang.create', compact('kategori_barang', 'barang'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:kategori_barangs,nama_kategori',
            'id_barang' => 'required|exists:barangs,id',
        ]);

        $kategori_barang = new Kategori_barang();
        $kategori_barang->nama_kategori = $request->nama_kategori;
        $kategori_barang->id_barang = $request->id_barang;
        $kategori_barang->save();

        return redirect()->route('kategori_barang.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
{
    $kategori_barang = Kategori_barang::findOrFail($id);
    $barang = Barang::all(); 
    return view('kategori_barang.edit', compact('kategori_barang', 'barang'));
}


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
            'id_barang' => 'required|exists:barangs,id',
        ]);

        $kategori_barang = Kategori_barang::findOrFail($id);
        $kategori_barang->nama_kategori = $request->nama_kategori;
        $kategori_barang->id_barang = $request->id_barang;
        $kategori_barang->save();

        return redirect()->route('kategori_barang.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori_barang = Kategori_barang::findOrFail($id);
        $kategori_barang->delete();

        return redirect()->route('kategori_barang.index')->with('success', 'Data berhasil dihapus!');
    }
}

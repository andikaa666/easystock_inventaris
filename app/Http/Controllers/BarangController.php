<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Menampilkan daftar barang.
     */
    public function getBarang()
    {
    $data = Barang::all(['id', 'nama_barang', 'stok', 'keterangan_barang']); // Ambil hanya field yang dibutuhkan

    return response()->json([
        'status' => 'success',
        'data' => $data
    ]);
    }

    public function getLowStockItems()
{
    $barang = Barang::all()->filter(function ($item) {
        $sisa = $item->stok - $item->dipinjam;
        return $sisa < 5;
    })->values();

    // Optional: Tambahkan sisa stok ke response
    $barang = $barang->map(function ($item) {
        $item->sisa_stok = $item->stok - $item->dipinjam;
        return $item;
    });

    return response()->json($barang);
}



    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required|unique:barangs,nama_barang',
            'stok' => 'required|integer',
            'keterangan_barang' => 'required',
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->keterangan_barang = $request->keterangan_barang;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required|unique:barangs,nama_barang,' . $id,
            'stok' => 'required|integer',
            'keterangan_barang' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->keterangan_barang = $request->keterangan_barang;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(['message' => 'Data berhasil dihapus!'], 200);
    }
}

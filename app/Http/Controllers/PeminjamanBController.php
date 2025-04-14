<?php

namespace App\Http\Controllers;
use App\Models\PeminjamanB;
use App\Models\Barang;

use Illuminate\Http\Request;

class PeminjamanBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamanB = PeminjamanB::all();
        $barang = Barang::all();
        return view('peminjamanB.index', compact('peminjamanB','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $peminjamanB = PeminjamanB::all();
        return view('peminjamanB.create', compact('peminjamanB', 'barang'));
    }

    public function store(Request $request)
    {

    $this->validate($request, [
        'nama_peminjam' => 'required',
        'tanggal_peminjaman' => 'required',
        'jumlah_barang' => 'required|integer|min:1',
        'id_barang' => 'required|exists:barangs,id',
    ]);

    $barang = Barang::findOrFail($request->id_barang);

    if ($barang->stok < $request->jumlah_barang) {
        return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
    }

    $peminjamanB = new PeminjamanB();
    $peminjamanB->nama_peminjam = $request->nama_peminjam;
    $peminjamanB->tanggal_peminjaman = $request->tanggal_peminjaman;
    $peminjamanB->jumlah_barang = $request->jumlah_barang;
    $peminjamanB->id_barang = $request->id_barang;
    $peminjamanB->save();

    $barang->stok -= $request->jumlah_barang;
    $barang->save();

    return redirect()->route('peminjamanB.index')->with('success', 'Peminjaman berhasil ditambahkan dan stok barang diperbarui!');
}


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $barang = Barang::all();
        $peminjamanB = PeminjamanB::findOrFail($id);
        return view('peminjamanB.edit', compact('peminjamanB', 'barang'));
    }


    public function update(Request $request, $id)
    {
        {
            $this->validate($request, [
                'nama_peminjam' => 'required',
                'tanggal_peminjaman' => 'required',
                'jumlah_barang' => 'required|integer|min:1',
                'id_barang' => 'required|exists:barangs,id',
            ]);

            $peminjamanB = Barang::findOrFail($id);
            $barang = $peminjamanB->barang;
            $barang->stok = $barang->stok - $peminjamanB->jumlah_barang + $request->jumlah_barang;
            $barang->save();
            $peminjamanB->update($request->all());
            $peminjamanB->save();
            return redirect()->route('peminjamanB.index')->with('success', 'data berhasil di edit');
        }
    }


    public function destroy($id)
{
    $peminjamanB = PeminjamanB::find($id);

    if (!$peminjamanB) {
        return redirect()->route('peminjamanB.index')->with('error', 'Data tidak ditemukan!');
    }

    // Tambahkan kembali jumlah barang yang dipinjam ke stok
    $barang = Barang::find($peminjamanB->id_barang);
    if ($barang) {
        $barang->stok += $peminjamanB->jumlah_barang;
        $barang->save();
    }

    $peminjamanB->delete();

    return redirect()->route('peminjamanB.index')->with('success', 'Data berhasil dihapus dan stok dikembalikan!');
}



    // private function generateKodePeminjaman()
    // {
    // // Ambil tanggal hari ini dalam format YYYYMMDD
    // $date = now()->format('Ymd');

    // // Ambil nomor urut terakhir dari database
    // $lastPeminjaman = PeminjamanB::where('kode_peminjaman', 'like', 'PINJ-' . $date . '-%')
    //     ->orderBy('kode_peminjaman', 'desc')
    //     ->first();

    // // Jika tidak ada data sebelumnya, nomor urut dimulai dari 001
    // $number = $lastPeminjaman ? intval(substr($lastPeminjaman->kode_peminjaman, -3)) + 1 : 1;

    // // Format nomor urut dengan leading zeros (3 digit)
    // $numberFormatted = str_pad($number, 3, '0', STR_PAD_LEFT);

    // // Gabungkan prefix, tanggal, dan nomor urut
    // return 'PINJ-' . $date . '-' . $numberFormatted;
    // }
}

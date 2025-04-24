<?php

namespace App\Http\Controllers;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Barang;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = Pengembalian::all();
        $barang = Barang::all();
        $peminjaman = Peminjaman::all();
        return view('pengembalian.index', compact('pengembalian','peminjaman','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'peminjaman_id' => 'required|exists:peminjaman,id',
        'barang_id' => 'required|exists:barang,id',
        'tanggal_pengembalian' => 'required|date',
        'jumlah' => 'required|numeric|min:1',
        'status_barang' => 'required|string',

    ]);

    $pengembalian = Pengembalian::create([
        'peminjaman_id' => $request->peminjaman_id,
        'barang_id' => $request->barang_id,
        'tanggal_pengembalian' => $request->tanggal_pengembalian,
        'jumlah' => $request->jumlah,
        'status_barang' => $request->status_barang,
    ]);

    return response()->json([
        'message' => 'Data pengembalian berhasil disimpan.',
        'data' => $pengembalian
    ]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

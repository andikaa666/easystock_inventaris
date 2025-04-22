<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Barang; 
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function exportPDF()
    {
        // Ambil semua data barang dari database
        $barang = Barang::all(); // Kamu bisa sesuaikan dengan model dan data yang ingin diexport

        // Load view dan pass data ke PDF
        $pdf = PDF::loadView('laporan', compact('barang'));

        // Download PDF dengan nama file
        return $pdf->download('laporan_barang_semua.pdf');
    }
}

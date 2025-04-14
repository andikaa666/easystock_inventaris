<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\PeminjamanB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalPinjam = PeminjamanB::count();
        return view('home', compact('totalBarang','totalPinjam'));



    }
}

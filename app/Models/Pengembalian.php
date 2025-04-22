<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['tanggal_pengembalian','jumlah_barang','status_barang','total_denda', 'id_barang','id_peminjaman'];
    protected $visible = ['tanggal_pengembalian','jumlah_barang','status_barang','total_denda', 'id_barang','id_peminjaman'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function peminjamanB()
    {
        return $this->belongsTo(PeminjamanB::class, 'id_peminjam');
    }
}

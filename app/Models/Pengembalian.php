<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['nama_peminjam','tanggal_pengembalian','jumlah_barang','status_barang', 'id_barang'];
    protected $visible = ['nama_peminjam','tanggal_pengembalian','jumlah_barang','status_barang', 'id_barang'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

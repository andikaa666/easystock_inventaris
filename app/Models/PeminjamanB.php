<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanB extends Model
{
    use HasFactory;
    protected $fillable = ['nama_peminjam','tanggal_peminjaman','jumlah_barang', 'id_barang'];
    protected $visible = ['nama_peminjam','tanggal_peminjaman','jumlah_barang', 'id_barang'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

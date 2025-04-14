<?php

namespace App\Models;
use App\Models\Barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori', 'id_barang'];
    protected $visible = ['nama_kategori', 'id_barang'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

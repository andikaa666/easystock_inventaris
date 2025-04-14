<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public function kategori_barang()
   {
    return $this->hasMany(Barang::class, 'id_barang');
   }
   public function peminjamanB()
   {
    return $this->hasMany(Barang::class, 'id_barang');
   }
}

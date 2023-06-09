<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
 
        protected $fillable = [
            'id_obat',
            'nama_obat',
            'gambar_obat',
            'stok_obat',
            'harga_obat',
            'kategori_obat',
            'keterangan_obat',
        ];

}

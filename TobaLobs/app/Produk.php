<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'name', 'harga', 'deskripsi', 'kategori_id', 'gambar',
    ];
}

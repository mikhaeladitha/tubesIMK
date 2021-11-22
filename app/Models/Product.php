<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menyatakan kolom data yang dapat diisi
    protected $fillable = ['nama_produk', 'gambar', 'harga', 'masa_preorder', 'kondisi_produk', 'berat', 'deskripsi', 'stock'];

    public function getGambar() {
        // Mengganti gambar produk dengan gambar default jika tidak dimasukkan saat tambah data
        if(!$this->gambar) {
            return asset('images/products/coffee-default.png');
        }

        // Menyimpan gambar produk
        return asset('images/products/'.$this->gambar);
    }
}

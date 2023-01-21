<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $fillable = ['nama_baju','slug', 'harga', 'stok', 'foto','deskripsi'];
    public $timestamp = true;

    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'id_barang');
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_barang');
    }
    public function image()
    {
        if ($this->foto && file_exists(public_path('images/barang/' . $this->foto))) {
            return asset('images/barang/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/barang/' . $this->foto))) {
            return unlink(public_path('images/barang' . $this->foto));
        }

    }
    public  function getRouteKeyName(){
        return 'slug';
    }
}

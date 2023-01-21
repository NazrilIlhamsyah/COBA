<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $fillable = ['id_costumer', 'id_barang','harga', 'jumlah', 'tgl_transaksi'];
    public $timestamp = true;

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'id_costumer');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

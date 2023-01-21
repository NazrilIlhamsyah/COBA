<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    public $fillable = ['nama_costumer', 'jk', 'no_telpon', 'alamat'];
    public $timestamp = true;

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_costumer');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public $timestamps = true;

    //relasi one to one
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

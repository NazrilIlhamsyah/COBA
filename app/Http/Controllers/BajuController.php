<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Costumer;

class BajuController extends Controller
{
    // public function index()
    // {
    //     $barang = Barang::all();
    //     return view('customer.index', compact('barang'));
    // }

    public function store()
    {
        $barang = Barang::all();
        return view('customer.store', compact('barang' ));
    }
    public function product()
    {
        $barang = Barang::all();
        return view('customer.product',compact('barang'));
    }

    public function cart(Barang $barang)
    {
        $barang = Barang::all();
        return view('cart', compact('barang'));
    }
    public function checkout()
    {
        $costumer = Costumer::all();
        return view('checkout', compact('costumer'));
    }
}
   


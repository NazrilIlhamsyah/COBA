<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Costumer;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->Transaksi = new Transaksi();
    }
    public function index()
    {
        $transaksi = Transaksi::with('costumer','barang')->get();
        return view('transaksi.index', ['transaksi' => $transaksi]);
    }
    // public function checkout()
    // {
    //     $transaksi = Transaksi::with('costumer','barang')->get();
    //     return view('customer.checkout', ['transaksi' => $transaksi]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $costumer = Costumer::all();
        return view('transaksi.create',compact('barang','costumer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'id_costumer' => 'required',
            'id_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'tgl_transaksi' => 'required',
        ]);

        $transaksi = new Transaksi();
        $transaksi->id_costumer = $request->id_costumer;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $request->jumlah * $request->harga;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;
        $transaksi->save();
        return redirect()->route('transaksi.index')
            ->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $costumer = Costumer::all();
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi','costumer','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([

        //     'id_costumer' => 'required',
        //     'id_barang' => 'required',
        //     'harga' => 'required',
        //     'jumlah' => 'required',
        //     'total' => 'required',
        //     'tgl_transaksi' => 'required',
        // ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->id_costumer = $request->id_costumer;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $request->jumlah * $request->harga;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;
        $transaksi->save();
        return redirect()->route('transaksi.index')
            ->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}

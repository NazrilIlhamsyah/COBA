<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Costumer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Str;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function cart( $barang, Request $request)
    {
        $barang = Barang::where('slug',$barang)->first();
        $jumlah = $request->jumlah;
        return view('customer.cart', compact('barang','jumlah'));

    }

    public function checkout($barang, Request $request)
    {
        $barang = Barang::where('slug',$barang)->first();
        $jumlah = $request->jumlah;
        $costumer = Costumer::all();
        $transaksi = Transaksi::all();
        return view('customer.checkout', compact('costumer','barang','jumlah','transaksi'));

    }
    
    public function storee()
    {
        $barang = Barang::all();
        return view('customer.store', compact('barang'));

    }
    public function product(Barang $barang)
    {
        return view('customer.product', compact('barang'));

    }

    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('barang.create');
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
            'nama_baju' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
        ]);
        $barang = new Barang();
        $barang->nama_baju = $request->nama_baju;
        $barang->slug= Str::slug($request->nama_baju,'-');
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
            $barang->foto = $name;
        }
        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.show', compact('barang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));

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
        $validated = $request->validate([
            'nama_baju' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->nama_baju = $request->nama_baju;
        $barang->slug= Str::slug($request->nama_baju,'-');
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
            $barang->foto = $name;
        }
        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Dibuat!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}

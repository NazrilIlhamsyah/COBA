<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::with('barang')->get();
        return view('supplier.index', ['supplier' => $supplier
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('supplier.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([

            'nama_supplier' => 'required',
            'jumlah' => 'required',
            'id_barang' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->jumlah = $request->jumlah;
        $supplier->id_barang = $request->id_barang;
        $supplier->save();
          $barang = Barang::findOrFail($request->id_barang);
          $barang->stok += $request->jumlah;
          $barang->save();
        return redirect()->route('supplier.index')
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
        $supplier = Supplier::findOrFail($id);

        return view('supplier.show', compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $barang = Barang::all();
        return view('supplier.edit', compact('supplier','barang'));
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

            'nama_supplier' => 'required',
            'jumlah' => 'required',
            'id_barang' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->jumlah = $request->jumlah;
        $supplier->id_barang = $request->id_barang;
        $supplier->save();
        return redirect()->route('supplier.index')
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
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}

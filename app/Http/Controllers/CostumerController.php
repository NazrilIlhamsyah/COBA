<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumer = Costumer::all();
        return view('costumer.index', compact('costumer'));

    }
public function status()
    {
       
        return view('customer.status');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.create');
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

            'nama_costumer' => 'required',
            'jk' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $costumer = new Costumer();
        $costumer->nama_costumer = $request->nama_costumer;
        $costumer->jk = $request->jk;
        $costumer->no_telpon = $request->no_telpon;
        $costumer->alamat = $request->alamat;
        $costumer->save();
        return redirect('/admin/costumer')
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
        $costumer = Costumer::findOrFail($id);

        return view('costumer.show', compact('costumer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumer = Costumer::findOrFail($id);
        return view('costumer.edit', compact('costumer'));
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

            'nama_costumer' => 'required',
            'jk' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
        ]);

        $costumer = Costumer::findOrFail($id);
        $costumer->nama_costumer = $request->nama_costumer;
        $costumer->jk = $request->jk;
        $costumer->no_telpon = $request->no_telpon;
        $costumer->alamat = $request->alamat;
        $costumer->save();
        return redirect()->route('costumer.index')
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
        $costumer = Costumer::findOrFail($id);
        $costumer->delete();
        return redirect()->route('costumer.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}

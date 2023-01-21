<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class usercontroller extends Controller
{
public function Home(){
    return view('home',[
        'data' => Barang::all()
    ]);
}
}

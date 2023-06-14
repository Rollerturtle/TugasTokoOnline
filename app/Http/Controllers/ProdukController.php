<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::get();
        return view ('produk.index')->with('produk', $produk);
    }

    public function available()
    {
        $produk = Produk::where('stok', '>', 0)->get();
        return view('produk.available')->with('produk', $produk);
    }
    
    public function getUnavailable()
    {
        //$produk2 = Produk::where('stok', '=', 0)->get();
        //return view('produk.unavailable')->with('produk', $produk2);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Produk::create($input);
        return redirect('produk')->with('flash_message', 'Produk Berhasil diTambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $input = $request->all();
        $produk->update($input);
        return redirect('produk')->with('flash_message', 'Data Produk Berhasil diPerbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('produk')->with('flash_message', 'Produk Berhasil diHapus!');
    }
    
}

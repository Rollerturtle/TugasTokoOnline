<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function getAvailable()
    {
        $produk = Produk::where('stok', '>', 0)->get();
        return view('produk.index')->with('produk', $produk);
    }
    
    public function getUnavailable()
    {
        $produk = Produk::where('stok', 0)->get();
        return view('produk.index')->with('produk', $produk);
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
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|numeric|min:100',
            'stok' => 'required|numeric|min:1',
            'detail' => 'required|nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect('produk/create')
                ->withErrors($validator)
                ->withInput()
                ->with('hapus', 'Data yang dimasukkan tidak valid! Mohon masukkan sesuai ketentuan berikut: 
                    Nama Produk: maksimal 100 karakter,
                    Harga: minimal 100,
                    Stok: minimal 1,
                    Semua data di atas tidak boleh kosong!');
        }

        $input = $request->all();
        Produk::create($input);
        return redirect('produk')->with('berhasil', 'Produk Berhasil diTambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return view('produk.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit')->with('produk', $produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|numeric|min:100',
            'stok' => 'required|numeric|min:1',
            'detail' => 'required|nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect('produk/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
                ->with('hapus', 'Data yang dimasukkan tidak valid! Mohon masukkan sesuai ketentuan berikut: 
                    Nama Produk: maksimal 100 karakter,
                    Harga: minimal 100,
                    Stok: minimal 1,
                    Semua data di atas tidak boleh kosong!');
        }

        $produk = Produk::find($id);
        $input = $request->all();
        $produk->update($input);
        return redirect('produk')->with('perbarui', 'Data Produk Berhasil diPerbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('produk')->with('hapus', 'Produk Berhasil diHapus!');
    }

    public function stok(Request $request, $id)
    {
        $produk = Produk::find($id);
        if ($request->input('stok') >= 0) {
            $produk->stok = $request->input('stok');
            $produk->save();
        }
        return redirect()->back()->with('perbarui', 'Stok produk berhasil diubah!');
    }


    
}

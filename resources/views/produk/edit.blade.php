@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Ubah Data Produk</div>
  <div class="card-body">
       
      <form action="{{ url('produk/' . $produk->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" value="{{ $produk->id }}" />
        <label>Produk</label><br>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control"><br>
        <label>Harga</label><br>
        <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control"><br>
        <label>Stok</label><br>
        <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control"><br>
        <label>Detail</label><br>
        <textarea name="detail" class="form-control">{{ $produk->detail }}</textarea><br>
        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
    
  </div>
</div>
  
@stop

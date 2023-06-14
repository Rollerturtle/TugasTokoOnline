@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Tambahkan Produk Baru</div>
  <div class="card-body">
       
      <form action="{{ url('produk') }}" method="post">
        {!! csrf_field() !!}
        <label>Produk</label></br>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control"></br>
        <label>Harga</label></br>
        <input type="number" name="harga" id="harga" class="form-control"></br>
        <label>Stok</label></br>
        <input type="number" name="stok" id="stok" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop
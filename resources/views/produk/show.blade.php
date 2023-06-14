@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Details Produk</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Produk : {{ $produk->nama_produk}}</h5>
        <p class="card-text">Harga : {{ "Rp. ".$produk->harga}}</p>
        <p class="card-text">Stok : {{ $produk->stok}}</p>
  </div>
    </hr>
  </div>
</div>
@endsection('content')
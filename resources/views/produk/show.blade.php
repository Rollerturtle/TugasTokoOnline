@extends('layouts.app')

@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">
    <h2>Details Produk</h2>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-0">
          {{ $produk->nama_produk }}
        </h2>
        <hr>
        <label for="" class="me-3">Rp. {{ $produk->harga }}</label>
        <p class="mt-3">
          {{$produk->detail}}
        </p>
        <hr>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="Stok">Stok</label>
            <div class="input-group text-center mb-3">
              <form action="{{ url('/produk/' . $produk->id . '/stok') }}" method="POST">
                @csrf
                @method('PUT')
                <input name="stok" type="hidden" value="{{ $produk->stok - 1 }}">
                <button type="submit" class="input-group-text">-</button>
              </form>
              <div class="form-control">{{ $produk->stok }}</div>
              <form action="{{ url('/produk/' . $produk->id . '/stok') }}" method="POST">
                @csrf
                @method('PUT')
                <input name="stok" type="hidden" value="{{ $produk->stok + 1 }}">
                <button type="submit" class="input-group-text">+</button>
              </form>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer text-center">
    <a href="{{ url('/produk') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a>
  </div>
</div>

@endsection

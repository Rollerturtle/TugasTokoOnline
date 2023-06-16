@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Ubah Data Produk</div>
  <div class="card-body">
       
      <form action="{{ url('produk/' .$produk->id.'/stok') }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="number" name="stok" id="stok" value="{{$produk->stok}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop
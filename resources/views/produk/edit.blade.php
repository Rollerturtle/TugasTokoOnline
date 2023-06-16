@extends('layouts.app')

@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header text-center"> <h2>Edit Data Produk</h2></div>
  <div class="card-body">

    @if(session('hapus'))
    <div class="alert alert-danger mt-4">
        {{ session('hapus') }}
    </div>
    @endif

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
      <div class="d-flex justify-content-between">
        <a href="{{ url('produk') }}" class="btn btn-danger" title="Kembali ke Halaman Index">
          <i class="fas fa-arrow-left"></i>
        </a>
        <button type="submit" class="btn btn-success" title="Simpan Data Perubahan">
          <i class="fas fa-save"></i> Save
        </button>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        toastr.options = {
          "positionClass": "toast-top-right", 
          "preventDuplicates": true, 
          "showDuration": "300", 
          "hideDuration": "1000", 
          "timeOut": "5000", 
          "extendedTimeOut": "1000", 
          "showEasing": "swing", 
          "hideEasing": "linear", 
          "showMethod": "fadeIn", 
          "hideMethod": "fadeOut" 
        };
    </script>
@endsection

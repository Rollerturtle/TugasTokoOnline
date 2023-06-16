@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin: 20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel Product Stock Management System</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/produk/create') }}" class="btn btn-success btn-sm" title="Tambahkan Data Produk">
                            Tambah Produk
                        </a>
                        <select name="filter" id="filter" class="float-end" onchange="changeFilter()">
                            <option value="full" {{ Request::is('produk') ? 'selected' : '' }}>Full</option>
                            <option value="available" {{ Request::is('produk/available') ? 'selected' : '' }}>Available</option>
                            <option value="unavailable" {{ Request::is('produk/unavailable') ? 'selected' : '' }}>Unavailable</option>
                        </select>                        
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($produk->count() > 0)
                                        @foreach($produk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ "Rp. ".$item->harga }}</td>
                                                <td>{{ $item->stok }}</td>

                                                <td>
                                                    <a href="{{ url('/produk/' . $item->id) }}" title="Lihat Details Produk">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('/produk/' . $item->id . '/edit') }}" title="Ubah Data Produk">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <form method="POST" action="{{ url('/produk' . '/' . $item->id) }}" accept-charset="UTF-8" style="display: inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data Produk" onclick="return confirm('Confirm delete?')">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Tidak ada produk yang tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeFilter() {
            var selectedOption = document.getElementById('filter').value;
            if (selectedOption !== '') {
                if (selectedOption === 'full') {
                    window.location.href = '{{ route("produk.index") }}';
                } else if (selectedOption === 'available') {
                    window.location.href = '{{ route("produk.available") }}';
                } else if (selectedOption === 'unavailable') {
                    window.location.href = '{{ route("produk.unavailable") }}';
                }
            }
        }
    </script>
    
@endsection

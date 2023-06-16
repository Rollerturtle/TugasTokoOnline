@extends('layouts.app')

@section('content')

    <div class="position-fixed top-0 end-0 m-4">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-12">
                    @if(session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('berhasil') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('perbarui'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('perbarui') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('hapus'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('hapus') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin: 20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Sistem Manajemen Stok Toko Online</h2>
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
                                                    <button class="btn btn-danger btn-sm" title="Hapus Data Produk" onclick="showDeleteConfirmation('{{ url('/produk/' . $item->id) }}')">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
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

    <div id="deleteConfirmationModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" action="" style="display: inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
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

        function showDeleteConfirmation(url) {
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = url;
            $('#deleteConfirmationModal').modal('show');
        }

        $(document).ready(function(){
            // Close flash message after 10 seconds
            $(".alert").delay(10000).slideUp(200, function() {
                $(this).alert('close');
            });
        });
    </script>

@endsection

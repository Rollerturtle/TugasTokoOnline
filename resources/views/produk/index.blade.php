@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel Product Stock Management System</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/produk/create') }}" class="btn btn-success btn-sm" title="Tambahkan Produk Baru">
                            Tambahkan Produk
                        </a>
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
                                @foreach($produk as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ "Rp. ".$item->harga }}</td>
                                        <td>{{ $item->stok }}</td>
  
                                        <td>
                                            <a href="{{ route('produk.show', $item->id) }}" title="Details Produk"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Details</button></a>
                                            <a href="{{ route('produk.edit', $item->id) }}" title="Edit Produk"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a></a>
  
                                            <form method="POST" action="{{ url('/produk' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Produk" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
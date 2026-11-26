@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<hr>
<a href="{{ url('/product/addProduct') }}" class="btn btn-primary mb-3">Tambah Data</a>

@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="card mb-4">
    <div class="card-header">Produk Kami</div>
    <div class="card-body">
        <div class="alert alert-info mb-0">
            <div><strong>Nama Toko :</strong> {{ $data_toko['nama_toko'] }}</div>
            <div><strong>Alamat Toko :</strong> {{ $data_toko['alamat_toko'] }}</div>
            <div><strong>Status Toko :</strong> {{ $data_toko['status_toko'] }}</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_produk as $product)
                    @php
                        $productId = $product->id_product ?? $product->id;
                    @endphp
                    <tr>
                        <th scope="row">{{ ($data_produk->perPage() * ($data_produk->currentPage() - 1)) + $loop->iteration }}</th>
                        <td>{{ $product->name_product }}</td>
                        <td>{{ $product->stock_product }}</td>
                        <td>Rp. {{ number_format($product->price_product, 0, ',', '.') }}</td>
                        <td>{{ $product->desc_product }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ url('/product/' . $productId) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                <a href="{{ url('/product/' . $productId . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/product/' . $productId) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $data_produk->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
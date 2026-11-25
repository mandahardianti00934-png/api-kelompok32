@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<hr>
<a href="/product/addProduct" class="btn btn-primary mb-3">Tambah Data</a>
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="card">
    <div class="card-header">
        Produk Kami
    </div>
    <div class="alert alert-primary">
        <b>Nama Toko : </b> {{$data_toko['nama_toko']}}
        <br>
        <b>Alamat Toko : </b> {{$data_toko['alamat_toko']}}
        <br>
        <b>Status Toko : </b> {{$data_toko['status_toko']}}
    </div>
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
                @foreach ($data_produk as $item)
                @php
                    $productId = $item->id_product ?? $item->id;
                @endphp
                <tr>
                    <th scope="row">{{($data_produk->perPage() * ($data_produk->currentPage()-1)) +
                        $loop->iteration}}</th>
                    <td>{{$item->name_product}}</td>
                    <td>{{$item->stock_product}}</td>
                    <td>Rp. {{number_format($item->price_product, 0, ',', '.')}}</td>
                    <td>{{$item->desc_product}}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ url('/product/' . $productId . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/product/' . $productId) }}" method="POST" onsubmit="return confirm('KONFIRMASI ULANG !!! Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $data_produk->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
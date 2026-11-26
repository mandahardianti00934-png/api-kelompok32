@extends('layouts.master')

@section('content')
<h1>Detail Produk</h1>
<hr>
<a href="{{ url('/product') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Produk</a>

@php
    $productId = $product->id_product ?? $product->id;
@endphp

<div class="card">
    <div class="card-header">
        Informasi Produk
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $productId }}</p>
        <p><strong>Nama Produk:</strong> {{ $product->name_product }}</p>
        <p><strong>Stok:</strong> {{ $product->stock_product }}</p>
        <p><strong>Harga:</strong> Rp. {{ number_format($product->price_product, 0, ',', '.') }}</p>
        <p><strong>Deskripsi:</strong> {{ $product->desc_product }}</p>
        <a href="{{ url('/product/' . $productId . '/edit') }}" class="btn btn-warning">Edit Produk</a>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('content')
<h1>Edit Data Produk</h1>
<hr>
<a href="{{ url('/product') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Produk</a>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@php
    $productId = $product->id_product ?? $product->id;
@endphp

<div class="card">
    <div class="card-header">
        Form Edit Produk
    </div>
    <div class="card-body">
        <form action="{{ url('/product/' . $productId) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="name_product" class="form-label">Nama Produk</label>
                    <input type="text" name="name_product" id="name_product" class="form-control"
                           value="{{ old('name_product', $product->name_product) }}">
                </div>
                <div class="col-md-4">
                    <label for="stock_product" class="form-label">Stok Produk</label>
                    <input type="number" name="stock_product" id="stock_product" class="form-control"
                           value="{{ old('stock_product', $product->stock_product) }}">
                </div>
                <div class="col-md-4">
                    <label for="price_product" class="form-label">Harga Produk</label>
                    <input type="number" name="price_product" id="price_product" class="form-control"
                           value="{{ old('price_product', $product->price_product) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="desc_product" class="form-label">Deskripsi Produk</label>
                <textarea name="desc_product" id="desc_product" rows="3" class="form-control">{{ old('desc_product', $product->desc_product) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>
@endsection
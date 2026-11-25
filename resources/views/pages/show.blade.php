@extends('layouts.master')

@section('content')
<h1>Detail Kategori Produk</h1>
<hr>
<a href="{{ url('/category') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Kategori</a>

@php
    $categoryId = $category->id ?? $category->id_category;
@endphp

<div class="card">
    <div class="card-header">
        Informasi Kategori
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $categoryId }}</p>
        <p><strong>Nama Kategori:</strong> {{ $category->category_name }}</p>
        <p><strong>Deskripsi:</strong> {{ $category->description }}</p>
        <a href="{{ url('/category/' . $categoryId . '/edit') }}" class="btn btn-warning">Edit Kategori</a>
    </div>
</div>
@endsection
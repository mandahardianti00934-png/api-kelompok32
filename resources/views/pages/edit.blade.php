@extends('layouts.master')

@section('content')
<h1>Edit Kategori Produk</h1>
<hr>
<a href="{{ url('/category') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Kategori</a>

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
    $categoryId = $category->id ?? $category->id_category;
@endphp

<div class="card">
    <div class="card-header">
        Form Edit Kategori
    </div>
    <div class="card-body">
        <form action="{{ url('/category/' . $categoryId) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_name" class="form-label">Nama Kategori</label>
                <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Kategori</button>
        </form>
    </div>
</div>
@endsection
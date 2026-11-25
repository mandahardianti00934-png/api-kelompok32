@extends('layouts.master')

@section('content')
<h1>Tambah Kategori Produk</h1>
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

<div class="card">
    <div class="card-header">
        Form Tambah Kategori
    </div>
    <div class="card-body">
        <form action="{{ url('/category') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="category_name" class="form-label">Nama Kategori</label>
                <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </form>
    </div>
</div>
@endsection
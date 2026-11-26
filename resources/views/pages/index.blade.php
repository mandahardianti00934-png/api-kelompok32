@extends('layouts.master')

@section('content')
<h1>Daftar Kategori Produk</h1>
<hr>
<a href="{{ url('/category/create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        Data Kategori
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    @php
                        $categoryId = $category->id ?? $category->id_category;
                    @endphp
                    <tr>
                        <th scope="row">{{ ($categories->perPage() * ($categories->currentPage() - 1)) + $loop->iteration }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ url('/category/' . $categoryId) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                <a href="{{ url('/category/' . $categoryId . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/category/' . $categoryId) }}" method="POST" onsubmit="return confirm('KONFIRMASI ULANG !!! Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
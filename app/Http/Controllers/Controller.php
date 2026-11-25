<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_category' => 'required|min:3|max:50',
            'desc_category' => 'required',
        ]);

        Category::create($validated);

        return redirect('/category')->with('success', 'Data Kategori Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_category' => 'required|min:3|max:50',
            'desc_category' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect('/category')->with('success', 'Data Kategori Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/category')->with('success', 'Data Kategori Berhasil Dihapus');
    }
}
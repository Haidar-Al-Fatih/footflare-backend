<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // 1. HALAMAN DAFTAR PRODUK
    public function index()
    {
        $products = Product::with(['brand', 'category'])->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // 2. HALAMAN FORM TAMBAH PRODUK
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    // 3. FUNGSI SIMPAN PRODUK
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // Proses simpan gambar
        $path = $request->file('thumbnail')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'thumbnail_url' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}
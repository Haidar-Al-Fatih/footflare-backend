<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua data produk dari database
        $products = Product::all();

        // Mengembalikan response dalam bentuk JSON standar API
        return response()->json([
            'success' => true,
            'message' => 'Daftar data produk FootFlare berhasil diambil',
            'data' => $products
        ], 200);
    }
}
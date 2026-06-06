<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Product::query();

            // Filter Berdasarkan category_id jika dikirim dari Flutter
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            // Filter Berdasarkan brand_id jika dikirim dari Flutter
            if ($request->has('brand_id')) {
                $query->where('brand_id', $request->brand_id);
            }

            // Mengambil produk terbaru dari database
            $products = $query->latest()->get();

            return response()->json([
                'success' => true,
                'message' => 'Daftar produk berhasil diambil.',
                'data' => $products
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data produk.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
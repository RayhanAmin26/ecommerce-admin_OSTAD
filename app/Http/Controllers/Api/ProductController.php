<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return Product::with('category')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show(Product $product) {
        return $product->load('category');
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(null, 204);
    }
}

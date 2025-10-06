<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return response()->json(Category::all());
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show(Category $category) {
        return response()->json($category);
    }

    public function update(Request $request, Category $category) {
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy(Category $category) {
        $category->delete();
        return response()->json(null, 204);
    }
}

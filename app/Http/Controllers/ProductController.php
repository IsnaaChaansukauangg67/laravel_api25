<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Routing\Controller as RoutingController;

class ProductController extends RoutingController
{
   public function index()
   {
    $products = Product::with('category')->get();
    return response()->json($products);

   }  
   public function store(Request $request)
   {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:product_categories,id',
    ]);
    $product = Product::create($validated);

    return response()->json($product, 201);
   }
}

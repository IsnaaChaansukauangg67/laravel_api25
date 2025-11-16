<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $products = ProductCategory::all();
        return response()->json($products); 
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);
         $ProductCategory = ProductCategory::create($validated);
     
         return response()->json($ProductCategory, 201);
        }  //


    /**
     * Display the specified resource.
     */
    public function show (string $id)
    {
        $category=ProductCategory:: find ($id);
        return response()->json([
            'status' => 'success',
            'data' => $category, 
        ],201 );
        if(!$category){
            return response()->json([
                'status'=> 'gagal',
                'data'=>null,
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([ 
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        ]);
        $ProductCategory = ProductCategory::find($id);
        if(!$ProductCategory){
            return response()->json(['message'=>'Product category not found'],404);
        }
        $ProductCategory->update($validateData); 
        return response()->json($ProductCategory);
       //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::find($id);
        if(!$productCategory){
            return response()->json([
                'status'=> 'gagal',
                'data'=>null
            ],404);
        }
        $productCategory->delete();
        return response()->json([
            'status' =>'product category deleted succesfully',
        ],201);
    }


}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return [
            'status' => true,
            'message' => 'Products retrieved successfully',
            'data' => ProductResource::collection(Product::all()),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
            'gallery' => 'required',
            'price' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'quantity' => 'required',
            'category_id' => 'required'
        ]);
        $product = Product::create([
            'name' => '',
            'price' => $request->price,
            'description' => '',
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);
        if ($request->hasFile('image')) {
            $img_name = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
            $product->image()->create([
                'path' => $img_name,

            ]);
        }
        foreach ($request->gallery as $img) {
            $img_name = time() . $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $product->image()->create([
                'path' => $img_name,
                'type' => 'gallery'

            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => new ProductResource($product),
        ], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if ($product) {
            return response()->json([
                'status' => true,
                'message' => 'Product retrieved successfully',
                'data' => new ProductResource($product),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

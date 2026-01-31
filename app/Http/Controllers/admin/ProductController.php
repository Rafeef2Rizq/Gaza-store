<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->paginate();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $product = new Product();
        return view('admin.products.create', compact('categories', 'product'));
    }
    public function show()
    {

    }
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
        // $data = $request->except('_token', 'image', 'gallery');
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
        return redirect()
            ->route('admin.products.index')
            ->with('msg', 'Product  added successfully')
            ->with('type', 'success');



    }
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'quantity' => 'required',
            'category_id' => 'required'
        ]);

        $product->update([
            'name' => '',
            'price' => $request->price,
            'description' => '',
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path('images/' . $product->image->path));
            $product->image()->delete();
            $img_name = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
            $product->image()->create([
                'path' => $img_name,

            ]);
        }
        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                $img_name = time() . $img->getClientOriginalName();
                $img->move(public_path('images'), $img_name);
                $product->image()->create([
                    'path' => $img_name,
                    'type' => 'gallery'

                ]);
            }
        }
        return redirect()
            ->route('admin.products.index')
            ->with('msg', 'Product  updated successfully')
            ->with('type', 'info');

    }
    public function destroy(Product $product)
    {
        File::delete(public_path('images/' . $product->image->path));
        foreach ($product->gallery as $img) {
            File::delete(public_path('images/' . $img->path));

        }
        $product->image()->delete();
        $product->gallery()->delete();
        $product->delete();
        return redirect()
            ->route('admin.products.index')
            ->with('msg', 'Product  deleted successfully')
            ->with('type', 'danger');

    }
    public function delete_image($id)
    {
        $img = Image::find($id);
        File::delete(public_path('images/' . $img->path));

        return Image::destroy($id);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
    public function show($id)
    {

    }
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name_en' => 'required',
                'name_ar' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );



        $category = Category::create([
            'name' => '',
            'description' => ''
        ]);

        //Add image to relation

        if ($request->hasFile('image')) {
            $img_name = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $img_name);

            $category->image()->create([
                'path' => $img_name
            ]);
        }

        return redirect()->route('admin.categories.index')->with('msg', 'Category created successfully.')
            ->with('type', 'success');

    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name_en' => 'required',
                'name_ar' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        $category->update([
            'name' => '',
            'description' => ''
        ]);
        if ($request->hasFile('image')) {
            $img_name = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $img_name);

            $category->image()->create([
                'path' => $img_name
            ]);
        }

        return redirect()->route('admin.categories.index')->with('msg', 'Category updated successfully.')
            ->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('msg', 'Category deleted successfully.')
            ->with('type', 'danger');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //index
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $slug = Str::slug($request->name);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        if($category)
        {
            return back();
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    //update
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $slug = Str::slug($request->name);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        if($category)
        {
            return redirect()->route('category.index');
        }
        return redirect()->back()->withInput();
    }

    // destroy
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

}

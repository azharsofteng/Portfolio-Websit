<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    // index
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $slug = Str::slug($request->name);
        $portfolio = new Portfolio();
        $portfolio->category_id = $request->category_id;
        $portfolio->name = $request->name;
        $portfolio->slug = $slug;
        $portfolio->url = $request->url;
        $portfolio->image = $this->imageUpload($request, 'image', 'uploads/portfolio') ?? '';
        $portfolio->save();
        if($portfolio) {
            return redirect()->route('portfolio.index');
        }
        return redirect()->back()->withInput();
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $portfolioImage = '';
        if($request->hasFile('image')) {
            if(!empty($portfolio->image) && file_exists($portfolio->image)) {
                unlink($portfolio->image);
            }
            $portfolioImage = $this->imageUpload($request, 'image', 'uploads/portfolio');
        } else {
            $portfolioImage = $portfolio->image;
        }

        $slug = Str::slug($request->name);
        $portfolio->category_id = $request->category_id;
        $portfolio->name = $request->name;
        $portfolio->slug = $slug;
        $portfolio->url = $request->url;
        $portfolio->image = $portfolioImage;
        $portfolio->save();
        if($portfolio) {
            return redirect()->route('portfolio.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Portfolio $portfolio) {
        $portfolio->delete();
        return back();
    }
}

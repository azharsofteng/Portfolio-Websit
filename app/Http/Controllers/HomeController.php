<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $about = About::first();
        $categories = Category::all();
        $portfolios = Portfolio::latest()->get();
        return view('website', compact('about', 'categories', 'portfolios'));
    }
}

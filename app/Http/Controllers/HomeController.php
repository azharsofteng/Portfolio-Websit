<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $about = About::first();
        $categories = Category::all();
        $portfolios = Portfolio::latest()->get();
        $services = Service::latest()->get()->take(4);
        $education_resume = Resume::where('type', 'education')->latest()->get();
        $experience_resume = Resume::where('type', 'experience')->latest()->get();
        return view('website', compact('about', 'categories', 'portfolios', 'services', 'education_resume', 'experience_resume'));
    }

    public function blog()
    {
        $about = About::first();
        $blogs = Blog::latest()->get();
        return view('blog', compact('about', 'blogs'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $about = About::first();
        return view('singleBlog', compact('blog', 'about'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index() 
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);
        
        $slug = Str::slug($request->title);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->date = $request->date;
        $blog->description = $request->description;
        $blog->is_feature = $request->is_feature;
        $blog->image = $this->imageUpload($request, 'image', 'uploads/blog');
        $blog->save();
        if ($blog) {
            return redirect()->route('blog.index');
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date' => 'required',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);

        $blog = Blog::findOrFail($id);
        
        $blogImage = '';
        if ($request->hasFile('image')) {
            if (!empty($blog->image) && file_exists($blog->image)) {
                unlink($blog->image);
            }
            $blogImage = $this->imageUpload($request, 'image', 'uploads/blog');
        } else {
            $blogImage = $blog->image;
        }

        $slug = Str::slug($request->title);
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->date = $request->date;
        $blog->description = $request->description;
        $blog->is_feature = $request->is_feature;
        $blog->image = $blogImage;
        $blog->save();
        if ($blog) {
            return redirect()->route('blog.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back();
    }

}

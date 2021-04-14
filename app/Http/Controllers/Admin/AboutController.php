<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required',
            'phone' => 'required|min:11',
            'age' => 'required',
            'experience' => 'required',
            'country' => 'required',
            'designation' => 'required',
            'cover_picture' => 'mimes:jpg,jpeg,png,bmp',
            'image' => 'mimes:jpg,jpeg,png,bmp',
            'resume' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);

        $coverImage = '';
        $profileImage = '';
        $resumePdf = '';
        // cover image
        if ($request->hasFile('cover_picture')) {
            if (!empty($about->cover_picture) && file_exists($about->cover_picture)) {
                unlink($about->cover_picture);
            }
            $coverImage = $this->imageUpload($request, 'cover_picture', 'uploads/about');
        } else {
            $coverImage = $about->cover_picture;
        }
        // profile image
        if ($request->hasFile('image')) {
            if (!empty($about->image) && file_exists($about->image)) {
                unlink($about->image);
            }
            $profileImage = $this->imageUpload($request, 'image', 'uploads/about');
        } else {
            $profileImage = $about->image;
        }
        // resume pdf
        if ($request->hasFile('resume')) {
            if (!empty($about->resume) && file_exists($about->resume)) {
                unlink($about->resume);
            }
            $resumePdf = $this->imageUpload($request, 'resume', 'uploads/about');;
        } else {
            $resumePdf = $about->resume;
        }
        
        $about->name = $request->name;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->age = $request->age;
        $about->experience = $request->experience;
        $about->country = $request->country;
        $about->location = $request->location;
        $about->designation = $request->designation;
        $about->freelance = $request->freelance;
        $about->facebook = $request->facebook;
        $about->instagram = $request->instagram;
        $about->twitter = $request->twitter;
        $about->linkedin = $request->linkedin;
        $about->cover_letter = $request->cover_letter;
        $about->cover_picture = $coverImage;
        $about->image = $profileImage;
        $about->resume = $resumePdf;
        $about->save();
        if ($about) {
            return back();
        }
        return redirect()->back()->withInput();
    }
}

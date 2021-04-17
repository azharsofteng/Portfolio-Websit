<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    // index
    public function index()
    {
        $resumes = Resume::latest()->get();
        return view('admin.resume.index', compact('resumes'));
    }

    public function create()
    {
        return view('admin.resume.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'degree_and_designation' => 'required|string|min:3',
            'type' => 'required',
            'session_and_year' => 'required',
        ]);
        
        $resume = new Resume();
        $resume->type = $request->type;
        $resume->degree_and_designation = $request->degree_and_designation;
        $resume->session_and_year = $request->session_and_year;
        $resume->short_description = $request->short_description;
        $resume->save();
        
        if($resume) {
            return redirect()->route('resume.index');
        }
        return redirect()->back()->withInput();
    }

    public function edit(Resume $resume)
    {
        return view('admin.resume.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'degree_and_designation' => 'required|string|min:3',
            'type' => 'required',
            'session_and_year' => 'required',
        ]);
        
        $resume->type = $request->type;
        $resume->degree_and_designation = $request->degree_and_designation;
        $resume->session_and_year = $request->session_and_year;
        $resume->short_description = $request->short_description;
        $resume->save();

        if($resume) {
            return redirect()->route('resume.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Resume $resume) 
    {
        $resume->delete();
        return back();
    }
}

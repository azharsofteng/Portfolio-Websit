<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patner;
use Illuminate\Http\Request;

class PatnerController extends Controller
{
    // index
    public function index()
    {
        $partners = Patner::latest()->get();
        return view('admin.patner.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'logo' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $partner = new Patner();
        $partner->name = $request->name;
        $partner->logo = $this->imageUpload($request, 'logo', 'uploads/partner') ?? '';
        $partner->save();

        if($partner) {
            return back();
        }
        return redirect()->back()->withInput();
    }

    public function edit(Patner $patner)
    {
        return view('admin.patner.edit', compact('patner'));
    }

    public function update(Request $request, Patner $patner)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'logo' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $partnerLogo = '';
        if($request->hasFile('logo')) {
            if(!empty($patner->logo) && file_exists($patner->logo)) {
                unlink($patner->logo);
            }
            $partnerLogo = $this->imageUpload($request, 'logo', 'uploads/partner');
        } else {
            $partnerLogo = $patner->logo;
        }

        $patner->name = $request->name;
        $patner->logo = $partnerLogo;
        $patner->save();
        if($patner) {
            return redirect()->route('patner.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Patner $patner) {
        $patner->delete();
        return back();
    }
}

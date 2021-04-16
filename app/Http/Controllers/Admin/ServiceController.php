<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    // index
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'icon' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $slug = Str::slug($request->name);
        $service = new Service();
        $service->name = $request->name;
        $service->slug = $slug;
        $service->short_description = $request->short_description;
        $service->icon = $this->imageUpload($request, 'icon', 'uploads/service') ?? '';
        $service->save();

        if($service) {
            return back();
        }
        return redirect()->back()->withInput();
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'icon' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        
        $serviceIcon = '';
        if($request->hasFile('icon')) {
            if(!empty($service->icon) && file_exists($service->icon)) {
                unlink($service->icon);
            }
            $serviceIcon = $this->imageUpload($request, 'icon', 'uploads/service');
        } else {
            $serviceIcon = $service->icon;
        }

        $slug = Str::slug($request->name);
        $service->name = $request->name;
        $service->slug = $slug;
        $service->short_description = $request->short_description;
        $service->icon = $serviceIcon;
        $service->save();
        if($service) {
            return redirect()->route('service.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Service $service) {
        $service->delete();
        return back();
    }
}

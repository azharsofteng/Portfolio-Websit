<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::all()->count();
        $contact = Contact::all()->count();
        $portfolio = Portfolio::all()->count();
        return view('admin.dashboard', compact('contact', 'services', 'portfolio'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return View('auth.login');
    }

    public function authCheck(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required|min:1',
        ]);

        $credentials = $request->only('user_name', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'user_name' => 'required',
            'image' => 'mimes:jpg, png, jpeg, bmp'
        ]);

        $profile = User::findOrFail(Auth::id());

        $profileImage = '';
        if($request->hasFile('image')) {
            if(!empty($profile->image) && file_exists($profile->image)) {
                unlink($profile->image);
            }
            $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
        } else {
            $profileImage = $profile->image;
        }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->user_name = $request->user_name;
        $profile->image = $profileImage;
        $profile->save();
        
        if($profile)
        {
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }

    // password change
    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required',
        ]);
        $has_password = Auth::user()->password;
        if(Hash::check($request->old_password, $has_password))
        {
            if(!Hash::check($request->password, $has_password))
            {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }
            else
            {
                return redirect()->back()->withInput();
            }
        }
        else
        {
            return 'password dose not match';
        }
    }
}

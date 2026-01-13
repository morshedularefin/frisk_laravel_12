<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('front.user.dashboard');
    }

    public function profile()
    {
        return view('front.user.profile');
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'password' => 'nullable|string|min:8',
            'confirm_password' => 'nullable|same:password',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::where('id', Auth::guard('web')->user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        
        $user->password = $request->password ? bcrypt($request->password) : $user->password;

        if ($request->hasFile('avatar')) {
            $final_name = 'user_'.time().'.'.$request->avatar->getClientOriginalExtension();
            if($user->avatar && file_exists(public_path('uploads/'.$user->avatar))) {
                unlink(public_path('uploads/'.$user->avatar));
            }
            $request->avatar->move(public_path('uploads/'), $final_name);
            $user->avatar = $final_name;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

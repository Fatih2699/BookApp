<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $this->validate($request, [
            "name"    => "required",
            "email"  => "required|email"
        ]);

        $user = Auth::user();
        if ($request->hasFile('profile_img')) {
            $path = $request->file('profile_img')->store('users');
            $user->profile_img = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back();
    }

    public function show()
    {
        $user = Auth::user();
        $this->middleware('auth');
        return view('profile', ['user' => $user]);
    }
}

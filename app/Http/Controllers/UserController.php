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
        ]);
        $user = Auth::user();
        $input = $request->all();
        if ($request->hasFile('profile_img')) {
            $path = $request->file('profile_img')->store('users');
            $input['profile_img'] = $path;
        }
        $result = $user->update($input);
        return redirect()->back();
    }
    public function show()
    {
        $user = Auth::user();
        $this->middleware('auth');
        return view('profile', ['user' => $user]);
    }
}

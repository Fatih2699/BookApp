<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //login
    public function loginPage()
    {
        return view('loginandregister');
    }
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|max:8'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error',  $validator->errors()->first());
            }
            if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password
                ]
            )) {
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', "Oturum açılamadı");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "$e");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->except('profile_img');
        if ($request->hasFile('profile_img')) {
            $path = $request->file('profile_img')->store('users');
            $input['profile_img'] = $path;
        }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        session()->flash('status','Kayıt İşlemi Başarılı');
        return redirect()->back();
    }
}
